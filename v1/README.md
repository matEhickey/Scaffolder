# Scaffolder

Programme de g�neration d'un squelette de programme en PHP/SQL:
**Alpha, don't use for release!**

## Description:

A partir de la d�finition d'un mod�le de donn�es (une table et ses champs), le programme cr�e le controlleur et ses 5 m�thodes principales.
Il cr�e les pages qui recoivent les donn�es pour la cr�ation, la modification, et la suppression.
Il cr�e enfin une vue en tableau de tout les entr�es de la table, avec les boutons pour pouvoir modifier les donn�es.

Ps: Le programme ne cr�e pas, en soit, une application web compl�te. Elle fourni un squelette rapidement modifiable, pour ajuster aux besoins.
    
Lancement:
Le programme necessite [python3](https://www.python.org/download/releases/3.0/)
    
## Sous Windows:
Lancer l'executable dans batch : scaffolder.bat

# Sous Unix:

Dans le terminal ( et dans le dossier principal du programme )
~~~
py -3 sources/scaffolder.py
~~~ 

Marche aussi avec le clic, mais il faut accorder les permissions au fichier scaffolder.py
            
## Utilisation:

- Il faut cr�er 2 fichiers php nomm�s **"commonBegin.php" et "commonEnd.php"**, les 2 � placer dans un repertoire **commons**. Il s'agit des pages de layout (� inclure au d�but et fin de chaque page), elles definissent les themes de chacunes des pages.  
- La r�f�rence � bootstrap est vivement conseill� dans le commonBegin (en 2 lignes: <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script><script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> )  
- Je conseille de mettre aussi la page d'index du site dans le dossier "commons", pour pr�server les niveaux de repertoires de php (problemes li� aux paths relatifs).  
- Il faut utiliser une copie du fichier "paramBDD.php", en modifiant ses attributs d'acces, et en le placant � cot� du repertoire "commons".  
Habituelement serverName est "localhost", souvent le username est "root".   
- Il faut forcement un mot de passe sur une bdd ( TOUJOURS, je ne testerais jamais ce programme pour qu'il marche sur une bdd sans mot de passe. )  
Ensuite via un phpmyadmin-like, il faut cr�er sa nouvelle table, le premier champ doit etre "id", il faut le regler en int, et Auto Incr�ment (A-I), et choisir sa valeur comme celle d'index, les autres champs sont libres.  
- Il faut ensuite d�marrer ce logiciel, ecrire le nom de la table ( Oui, la casse importe, l'orthographe aussi ), et remplir les champs les uns apr�s les autres.  
- Quand ceci est fait, il suffit de cliquer sur le bouton "G�n�rer le scaffold", puis � fermer le programme.   
Avant de se fermer, le programme ouvre le dossier exports, pour rapidement visualiser le dossier au nom de notre table.  
- Il faut d�placer ce nouveau dossier � cot� du repertoire "commons" de votre projet.  
- Dans le navigateur, il faut aller a la page (en imaginant que votre repertoire de serveur soit "~", et le nom de la table soit "Table").  
**~/Table/ShowAllTable.php**  

## Boilerplate
Dans le dossier sources se trouve un dossier default avec un projet vide.  
il faut creer sa base de donn�es et renseigner le fichier de params.  
Importer les fichier sql elements et fontawesome, puis celui dans le dossier Link (exemple d'apres un export, table tres simple , un titre, un message, un element, qui peut donc etre un lien).  
Voir le commonBegin pour changer les affichage principaux comme pour cacher un lien vers les pages.

**Voila ! **