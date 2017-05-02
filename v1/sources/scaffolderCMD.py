#!/usr/bin/python
# -*- coding: latin-1 -*-

os = __import__('os')
import shutil

from func_generator import *
from view_generator import *
from modelGenerator import *

import subprocess

class Application():

        
    def createDir(self):
        if(os.path.exists("../exports/"+self.nomTable.title())):
            shutil.rmtree("../exports/"+self.nomTable.title())
        
        os.makedirs("../exports/"+self.nomTable.title())

    def generateCRUD(self,attributs):
    
        
        
        f = open("../exports/"+self.nomTable.title()+"/"+self.nomTable.title()+"Controller.php",'w+')
        f.close()
        f = open("../exports/"+self.nomTable.title()+"/"+self.nomTable.title()+"Controller.php",'r+')
        
        
        f.write("<?php\n")
        f.write("include_once(\"../paramBDD.php\");\n\n");
        
        funcG = funcGenerator(f,self.nomTable)
        funcG.createC(attributs)
        funcG.createR(attributs)
        funcG.createR_ById(attributs)
        funcG.createU(attributs)
        funcG.createD()
        
        f.write("\n\n?>")
        
        f.close()
        
    def generateViews(self,attributs):
        
        
    
        fIndex = open("../exports/"+self.nomTable.title()+"/"+"index.php",'w')
        fShowAll = open("../exports/"+self.nomTable.title()+"/"+"showAll"+self.nomTable.title()+".php",'w')
        fShowAllJson = open("../exports/"+self.nomTable.title()+"/"+"showAllJson.php",'w')
        fShowOneJson = open("../exports/"+self.nomTable.title()+"/"+"showOneJson.php",'w')
        fCreateFormNew = open("../exports/"+self.nomTable.title()+"/"+"createNew"+self.nomTable.title()+".php",'w')
        fNew = open("../exports/"+self.nomTable.title()+"/"+"create"+self.nomTable.title()+".php",'w')
        fModify = open("../exports/"+self.nomTable.title()+"/"+"modify"+self.nomTable.title()+".php",'w')
        fDelete = open("../exports/"+self.nomTable.title()+"/"+"delete"+self.nomTable.title()+".php",'w')
        
        
        viewG = viewGenerator(self.nomTable.title())
        
        viewG.createIndex(fIndex,attributs)
        viewG.createShowAll(fShowAll,attributs)
        viewG.createFormNew(fCreateFormNew,attributs)
        viewG.createNew(fNew,attributs)
        viewG.createModify(fModify,attributs)
        viewG.createDelete(fDelete,attributs)
        viewG.createShowAllJson(fShowAllJson)
        viewG.createShowOneJson(fShowOneJson)
        
        fIndex.close()
        fShowAll.close()
        fCreateFormNew.close()
        fNew.close()
        fModify.close()
        fDelete.close()
    
    def generateModel(self,attributs):
        fModel = open("../exports/"+self.nomTable.title()+"/"+"importTableSQL.sql",'w')
        
        modelG = modelGenerator(self.nomTable.title())
        modelG.createModel(fModel,attributs)
        
        fModel.close()
        
    def makeScaffold(self, attributs):
        types = []        
        
        self.createDir()
        self.generateCRUD(attributs)
        self.generateViews(attributs)
        self.generateModel(attributs)
        

        print("************************** Fini **************************\n")
        
        
        
    def affiche(self,fileName):
        f = open(fileName,'r+')
        for line in f:
            print(line)
        f.close()
        
    
    
    def openExplorer(self):
        subprocess.Popen('explorer ".\..\exports"')
        self.root.destroy();
    
    
    def __init__(self, nomTable,attributs):
        self.nomTable = nomTable
        self.makeScaffold(attributs)
        




    


app = Application("link2",["id","titre","message","elem"]);



