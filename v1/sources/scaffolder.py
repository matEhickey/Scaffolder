#!/usr/bin/python
# -*- coding: latin-1 -*-
from tkinter import *
from tkinter.ttk import *

os = __import__('os')
import shutil

from func_generator import *
from view_generator import *
from modelGenerator import *

import subprocess

class Application(Frame):


    def addChamp(self):
        newChamp = StringVar(self)
        newChampEntry = Entry(self, textvariable = newChamp, width=30)
        newChampEntry.pack()
        self.champs.append(newChamp)
        
    def createDir(self):
        if(os.path.exists("../exports/"+self.nomTable.get().title())):
            shutil.rmtree("../exports/"+self.nomTable.get().title())
        
        os.makedirs("../exports/"+self.nomTable.get().title())

    def generateCRUD(self,attributs):
    
        
        
        f = open("../exports/"+self.nomTable.get().title()+"/"+self.nomTable.get().title()+"Controller.php",'w+')
        f.close()
        f = open("../exports/"+self.nomTable.get().title()+"/"+self.nomTable.get().title()+"Controller.php",'r+')
        
        
        f.write("<?php\n")
        f.write("include_once(\"../paramBDD.php\");\n\n");
        
        funcG = funcGenerator(f,self.nomTable.get())
        funcG.createC(attributs)
        funcG.createR(attributs)
        funcG.createR_ById(attributs)
        funcG.createU(attributs)
        funcG.createD()
        
        f.write("\n\n?>")
        
        f.close()
        
    def generateViews(self,attributs):
        
        
    
        fIndex = open("../exports/"+self.nomTable.get().title()+"/"+"index.php",'w')
        fShowAll = open("../exports/"+self.nomTable.get().title()+"/"+"showAll"+self.nomTable.get().title()+".php",'w')
        fShowAllJson = open("../exports/"+self.nomTable.get().title()+"/"+"showAllJson.php",'w')
        fShowOneJson = open("../exports/"+self.nomTable.get().title()+"/"+"showOneJson.php",'w')
        fCreateFormNew = open("../exports/"+self.nomTable.get().title()+"/"+"createNew"+self.nomTable.get().title()+".php",'w')
        fNew = open("../exports/"+self.nomTable.get().title()+"/"+"create"+self.nomTable.get().title()+".php",'w')
        fModify = open("../exports/"+self.nomTable.get().title()+"/"+"modify"+self.nomTable.get().title()+".php",'w')
        fDelete = open("../exports/"+self.nomTable.get().title()+"/"+"delete"+self.nomTable.get().title()+".php",'w')
        
        
        viewG = viewGenerator(self.nomTable.get().title())
        
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
        fModel = open("../exports/"+self.nomTable.get().title()+"/"+"importTableSQL.sql",'w')
        
        modelG = modelGenerator(self.nomTable.get().title())
        modelG.createModel(fModel,attributs)
        
        fModel.close()
        
    def makeScaffold(self):
        attributs = []
        types = []
        for champ in self.champs:
            attributs.append(champ.get())   
        
        
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
        
        
    def createWidgets(self):
        self.label1 = Label(self, text="Utilitaire de Scaffolding par Mathias DIDIER")
        self.label1.pack()
        
        self.label2 = Label(self, text="Entrez le nom de la table:")
        self.label2.pack()
        
        self.nomTable = StringVar();
        self.nomTableEntry = Entry(self, textvariable=self.nomTable, width=30)
        self.nomTableEntry.pack()
        
        self.buttonValide = Button(self)
        self.buttonValide["text"] = "Generer le scaffold"
        self.buttonValide["command"] = self.makeScaffold
        self.buttonValide.pack()        
        
        self.buttonAddChamp = Button(self)
        self.buttonAddChamp["text"] = "Ajouter un champ"
        self.buttonAddChamp["command"] = self.addChamp
        self.buttonAddChamp.pack()
        
        self.label6 = Label(self, text="Les champs:")
        self.label6.pack()
        
        self.champs = []
        
        firstChamp = StringVar(self)
        firstChamp.set("id")
        firstChampEntry = Entry(self, textvariable = firstChamp, width=30)
        self.champs.append(firstChamp)
        firstChampEntry.pack()
        
        
        
        #print("Creation widgets fini")
    
    
    def openExplorer(self):
        subprocess.Popen('explorer ".\..\exports"')
        self.root.destroy();
    
    
    def __init__(self, master=None):
        Frame.__init__(self, master);
        
        self.root = master
        # make the top right close button lanch the explorer window, then quit
        #root.protocol("WM_DELETE_WINDOW", self.openExplorer)
        # make Esc exit the program
        root.bind('<Escape>', lambda e: root.destroy())
        
        self.pack();
        self.createWidgets();



root = Tk();


    


app = Application(master=root);
app.master.title("Scaffold");
app.master.minsize(500, 200)
app.master.maxsize(root.winfo_screenwidth(), root.winfo_screenheight())

app.mainloop();



