#!/usr/bin/python
# -*- coding: latin-1 -*-

#programme de scaffolding

#generateur des fonctions d'acces a la base

class funcGenerator:
    
    def __init__(self,f,table):
        self.file = f
        self.table = table
    def createConnection(self):
        
        
        self.file.write("\t$serverName = getServerName();\n")
        self.file.write("\t$username = getUser();\n")
        self.file.write("\t$password = getPsw();\n")
        self.file.write("\t$database = getBase();\n")
        self.file.write("\t$conn = new PDO('mysql:host='.$serverName.';dbname='.$database, $username, $password);\n")
        
        
        
    def createC(self,atributs):
        self.file.write("function create"+self.table.title()+"(")  #debut prototype
        #arguments
        i = 0
        chaineArgs = ""
        
        for attr in atributs:
            if(i != 0):
                chaineArgs+= ","
            chaineArgs+= "$"+attr
            i+=1
        #print(chaineArgs)
        self.file.write(chaineArgs.replace("$id,",""))
        #print(chaineArgs)
        self.file.write("){\n")  #fin prototype
        
        
        self.createConnection()
        
        
        self.file.write("\t$requete = \"INSERT INTO `"+self.table+"` (\n")  #debut requete
        i=0
        for attr in atributs:
            if(i==0):
                pass
            else:
                if(i!=1):
                    self.file.write(",\n")
                self.file.write("\t\t`"+attr+"`")
            i+=1
        self.file.write("\n\t)\n")
        self.file.write("\tVALUES (\n")
        i=0
        for attr in atributs:
            if(i==0):
                pass
            else:
                if(i!=1):
                    self.file.write(",\n")
                self.file.write("\t\t'\".$"+attr+".\"'")
            i+=1
        self.file.write("\n\t)")
        
        self.file.write(";\";\n") #fin chaine requete
        
        
        self.file.write("\t$statement = $conn->query($requete);\n");
        
        self.file.write("\tif($statement == TRUE) {\n")
        self.file.write("\t\t//echo \"<h3>L'opération a bien été effectuée</h3>\";\n")
        self.file.write("\t}\n")
        
        self.file.write("\telse{\n")
        #self.file.write("\t\techo \"<h3>Une erreur s'est produite.</h3>\";\n")
        self.file.write("\t\theader('Location: ../commons/error.php');\n")
        self.file.write("\t\t//var_dump($requete);\n")
        self.file.write("\t}\n")
        
        self.file.write("\t$lastInsert = $conn->lastInsertId();\n")
        self.file.write("\t$conn=null;\n")
        self.file.write("\treturn($lastInsert);\n")
        self.file.write("}\n")
       


    def createR(self,atributs):
        
        self.file.write("function getAll"+self.table.title()+"(){\n")
        self.createConnection()
        self.file.write("\t$requete = \"    SELECT * FROM  `"+self.table+"` \";\n")
        self.file.write("\t$retour = array();\n")
        self.file.write("\tif ($statement = $conn->query($requete)) {\n")
        self.file.write("\t\twhile($row = $statement->fetch(PDO::FETCH_ASSOC)){\n")
        
        self.file.write("\t\t\t$temp = array(")
        i = 0
        for attr in atributs:
            if(i!=0):
                self.file.write(",")
            self.file.write("\""+attr+"\" => $row['"+attr+"']")
            i+=1
        self.file.write(");\n")
        self.file.write("\t\t\tarray_push($retour,$temp);\n")
        
        self.file.write("\t\t}\n")
        self.file.write("\t}\n")
        
        self.file.write("\telse { \n")
        self.file.write("\t\theader('Location: ../commons/error.php');\n")
        self.file.write("\t\t//var_dump($requete);\n")
        self.file.write("\t}\n")
        self.file.write("\t$conn=null;\n")
        self.file.write("\treturn($retour);\n")
        self.file.write("}\n")

    def createR_ById(self,atributs):
        
        self.file.write("function get"+self.table.title()+"ById($id){\n")
        self.createConnection()
        self.file.write("\t$requete = \"    SELECT * FROM  `"+self.table+"` WHERE id=\".$id;\n")
        self.file.write("\t$retour = array();\n")
        self.file.write("\tif ($statement = $conn->query($requete)) {\n")
        self.file.write("\t\twhile($row = $statement->fetch(PDO::FETCH_ASSOC)){\n")
        
        self.file.write("\t\t\t$temp = array(")
        i = 0
        for attr in atributs:
            if(i!=0):
                self.file.write(",")
            self.file.write("\""+attr+"\" => $row['"+attr+"']")
            i+=1
        self.file.write(");\n")
        self.file.write("\t\t\tarray_push($retour,$temp);\n")
        
        self.file.write("\t\t}\n")
        self.file.write("\t}\n")
        
        self.file.write("\telse { \n")
        self.file.write("\t\theader('Location: ../commons/error.php');\n")
        self.file.write("\t\t//var_dump($requete);\n")
        self.file.write("\t}\n")
        self.file.write("\t$conn=null;\n")
        self.file.write("\treturn(count($retour)>0?$retour[0]:false);\n")
        self.file.write("}\n")
        
    def createU(self,atributs):
        self.file.write("function update"+self.table.title()+"(")
        i = 0
        for attr in atributs:
            if((i!=0) and (not (attr=="elem"))):
                self.file.write(",")
            if(not(attr=="elem")):
                self.file.write("$"+attr)
            i+=1
        self.file.write("){\n")
        self.createConnection()
        self.file.write("\t$requete =\"UPDATE `"+self.table+"` SET ")
        i = 0
        
        chaineArgs = ""
        for attr in atributs:
            if((i!=0) and (not (attr=="elem"))):
                chaineArgs += ","
            if(not(attr=="elem")):
                chaineArgs += "`"+attr+"` = '\".$"+attr+".\"' "
            i+=1
        self.file.write(chaineArgs.replace("`id` = '\".$id.\"' ,",""))
        self.file.write("WHERE id=\".$id;")
        self.file.write("\n")#fin chaine requete
        
        self.file.write("\t$statement = $conn->query($requete);\n");
        
        self.file.write("\tif($statement == TRUE) {\n")
        self.file.write("\t\t//echo \"<h3>L'opération a bien été effectuée</h3>\";\n")
        self.file.write("\t}\n")
        
        self.file.write("\telse{\n")
        self.file.write("\t\theader('Location: ../commons/error.php');\n")
        self.file.write("\t\t//var_dump($requete);\n")
        self.file.write("\t}\n")
        
        self.file.write("\t$conn=null;\n")
        self.file.write("}\n")
        

    def createD(self):
        self.file.write("function delete"+self.table.title()+"($id){\n")
        self.createConnection()
        self.file.write("\t$requete =\"DELETE FROM `"+self.table+"` WHERE `id` =\".$id;\n")
        self.file.write("\t$statement = $conn->query($requete);\n");
        self.file.write("\tif($statement== TRUE) {\n")
        self.file.write("\t\t//echo \"<h3>L'opération a bien été effectuée</h3>\";\n")
        self.file.write("\t}\n")
        
        self.file.write("\telse{\n")
        self.file.write("\t\theader('Location: ../commons/error.php');\n")
        self.file.write("\t\t//var_dump($requete);\n")
        self.file.write("\t}\n")
        
        self.file.write("\t$conn=null;\n")
        self.file.write("}\n")
        
        
        
    


    