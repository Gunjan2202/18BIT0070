#!/usr/bin/env python
# coding: utf-8

# # CyHome ADMIN 
# ---
# This notebook builds a flask backend to deploy the **`taskbrain`  Deep Learning model** into a localhost server **AKA the control centre of CyHome**. 

# ## STEP 0: Prepare essentials
# 1. Import libraries
# 2. Import `taskbrain` DL model

# In[2]:


#DOWNLOAD MODEL
from CyAdmin import *
import pymysql
connection=pymysql.connect(host="localhost",user="root",passwd="",database="cyhome")
cursor=connection.cursor()


# brain=models.load_model('deathblow.h5')
weights=weightloader()
print("taskbrain is locked; weights are loaded and Ready")


# ## STEP 1: Prepare necessary HTML page responses
# 
# To check if our server is live or not, we bring up a few dummy HTML pages that test the functionality and the workflow of the Admin Server.
# 
# 

# In[3]:


docs='<!DOCTYPE html><html><h1>CyHome ADMIN is Live!</h1></html>'
print('Raw HTML ready')


# ## STEP 2: Create a Flask server with necessary request descriptions
# 
# The flask module serves as the admin centre for CyHome. It receives encrypted inputs from several clients, which are fed into the taskbrain. The resulting Output is sent back to the respective clients for further processing. 
# 

# In[9]:


app = Flask(__name__)
preprocessing_dict={}
f=open("essentials/dicto.txt","r")
for line in f:
    vals=line.split(':')
    preprocessing_dict[int(vals[1])]=vals[0]
f.close()
revdicto={}
f=open("essentials/revdicto.txt","r")
for line in f:
    vals=line.split(':')
    revdicto[int(vals[0])]=vals[1]

@app.route('/ml_encrypted',methods=["GET","POST"])
def ml_encrypted():
    global n
        
    if request.environ.get('HTTP_X_FORWARDED_FOR') is None:
        ip=request.environ['REMOTE_ADDR']
    else:
        ip=request.environ['HTTP_X_FORWARDED_FOR']
        
    if(request.method=='POST'):
        
        content = request.json
        processor=content['array']
        ans=[0 for x in range(len(weights))]
        print('received ML_ENC Input: ',processor)
        for i in range(len(weights)):
            for j in range(len(weights[i])):
                if(j==0):
                    ans[i]=Pallier_mul(weights[i][j],processor[j])
                else:
                    ans[i]=Pallier_add(ans[i],Pallier_mul(weights[i][j],processor[j]))
        
        arr_in='['+str(processor[0])+','+str(processor[1])+',.....,'+str(processor[len(processor)-2])+','+ str(processor[len(processor)-1])+']'
        arr_out='['+str(ans[0])+','+str(ans[1])+','+str(ans[2])+','+str(ans[3])+','+str(ans[4])+','+str(ans[5])+',' +str(ans[6])+',' +str(ans[7])+']'
        in_info="input cannot be traced"
        out_info="output cannot be traced"
        query="insert into record values('"+ip+"','"+arr_in+"','"+in_info+"','"+arr_out+"','"+out_info+"')"
        cursor.execute(query)
        connection.commit()
        print('\nML OP sent to client: ',ans)    
        return {'res':ans}

@app.route('/ml_fraud',methods=["GET","POST"])
def ml_fraud():
    global n
    
    if request.environ.get('HTTP_X_FORWARDED_FOR') is None:
        ip=request.environ['REMOTE_ADDR']
    else:
        ip=request.environ['HTTP_X_FORWARDED_FOR']
        
    if(request.method=='POST'):
        
        content = request.json
        processor=content['array']
        ans=[0 for x in range(len(weights))]
        print('received ML_NORMAL Input: ',processor)
        for i in range(len(weights)):
            for j in range(len(weights[i])):
                if(j==0):
                    ans[i]=weights[i][j]*processor[j]
                else:
                    ans[i]=ans[i]+weights[i][j]*processor[j]
        print('\nML OP sent to client: ',ans)    
        
        arr_in='['+str(processor[0])+','+str(processor[1])+',.....,'+str(processor[len(processor)-2])+','+ str(processor[len(processor)-1])+']'
        arr_out='['+str(ans[0])+','+str(ans[1])+','+str(ans[2])+','+str(ans[3])+','+str(ans[4])+','+str(ans[5])+',' +str(ans[6])+',' +str(ans[7])+']'
        in_info="probable input: "
        for x in range(len(processor)):
            if(processor[x]==1):
                in_info+=" "+preprocessing_dict[x]
        out_info="probable output: "+revdicto[ans.index(max(ans))]
        query="insert into record values('"+ip+"','"+arr_in+"','"+in_info+"','"+arr_out+"','"+out_info+"')"   
        cursor.execute(query)
        connection.commit()
        
        return {'res':ans}

# ## STEP 3: Launch the server
# **Note:** the localhost port number for ADMIN is instantiated with 51393

# In[10]:


if __name__ == '__main__':
    app.run(port=51393)
    


# In[ ]:




