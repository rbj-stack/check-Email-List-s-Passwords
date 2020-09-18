import email
import imaplib
import json
import time
import multiprocessing
import sys
import re

email=sys.argv[1]
list_mails = [x.strip() for x in email.split(',')] # to array



# def opentest (t,username, password):
#     match=re.search(r"(^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9]+\.[a-zA-Z0-9.]*\.*$)",use                                                                                                                                                             rname)
#     if match:
#         try:
#             isp=init_ImapConfig(username.split('@')[1])[1]
#             port= init_ImapConfig(username.split('@')[1])[2]
#             mail = imaplib.IMAP4_SSL(isp,port)
#             result , data = mail.login(username,password)
#             print( [ 1 , username,password ])
#         except Exception as e:
#             print( [ 0 , username,password])
#     else:
#         print(  [2,username,password] )

def opentest (t,username, password):
    match=re.search(r"(^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9]+\.[a-zA-Z0-9.]*\.*$)",username)
    if match:
        try:
            isp=init_ImapConfig(username.split('@')[1])[1]
            port= init_ImapConfig(username.split('@')[1])[2]
            mail = imaplib.IMAP4_SSL(isp,port)
            mail.login(username,password)
            result = { "case" :1 , "email": username, "password" : password }
            print(json.dumps(result))
            # print( [ 1 , username,password ])
        except Exception:
            result = { "case" :0 , "email": username, "password" : password }
            print(json.dumps(result))
            
    else:
        result = { "case" :2 , "email": username, "password" : password }
        print(json.dumps(result))

def init_ImapConfig(hot):
    global ImapConfig
    ImapConfig = {}
    try:
        with open("hoster.dat", "r") as f:
            for line in f:
                if len(line) > 1 :
                    hoster = line.strip().split(':')
                    ImapConfig[hoster[0]] = (hoster[1], hoster[2])
                    if hot==hoster[0]:
                        return hoster
    except BaseException:
        print ("[ERROR]hoster.dat", "not found!")


def multiprocces(username,password,t):
    opentest(t,username,password)

# def multiprocces(username,password,t):
#         valid=[]
#         invalid=[]
#         invformat=[]


#         # for i in list_mails:
#         result = opentest(t,username,password)
#         if( result[0] == 0 ):
#             r=invalid.append(result)
#             # allList["invalid"]= invalid
#         if( result[0] == 1 ):
#             r=valid.append(result)
#             # allList["valid"]= valid
#         if( result[0] == 2 ):
#             r=invformat.append(result)
#             # allList["invformat"]= invformat
#         print(r)
        # allList = dict()
        # allList["valid"]= valid
        # allList["invalid"]= invalid
        # allList["invformat"]= invformat

        # print(json.dumps(allList))





for i in list_mails:
    process = multiprocessing.Process(target=multiprocces, args=(i.split(':')[0]                                                                                                                                                             ,i.split(':')[1],"multiprocessing 1"))
    process.start()
