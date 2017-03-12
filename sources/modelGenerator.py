#!/usr/bin/python
# -*- coding: latin-1 -*-

#programme de scaffolding

#generateur d'import des bases


class modelGenerator:

    def __init__(self,table):
        self.table = table
    
    def createModel(self,file,attributs):
        
        file.write("   \n\
CREATE TABLE IF NOT EXISTS `"+self.table[0].lower() + self.table[1:]+"` (   \n\
  `id` int(11) NOT NULL AUTO_INCREMENT,   \n\
        ")
        for attr in attributs:
            if(attr == "elem"):
                file.write("\
  `"+attr+"` int(11) NOT NULL,   \n\
                ")
            elif(not (attr == "id")):
                file.write("\
  `"+attr+"` text NOT NULL,   \n\
                ")
        file.write("\
  KEY `id` (`id`)   \n\
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0   \n\
        ")
        
        