import mysql.connector

mydb = mysql.connector.connect(host="localhost", user="root", password="", database="kuiz")
mycursor = mydb.cursor()
#sql = "SELECT * FROM users ORDER BY user_id DESC LIMIT 1"
sql = "SELECT * FROM users ORDER BY user_id"
mycursor.execute(sql)
myresult = mycursor.fetchall()
x = myresult
for y in x:
    eaml = y[3]
    print(eaml)
mydb.close()

