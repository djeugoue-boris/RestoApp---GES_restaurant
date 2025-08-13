drop database if exists restoapp;

create database if not exists restoapp character set utf8;
use restoapp;




# -----------------------------------------------------------------------------
#       table : user
# -----------------------------------------------------------------------------

create table user (
  iduser integer not null auto_increment ,
  nom varchar(128) null ,
  prenom varchar(128) null ,
  telephone varchar(128) null ,
  email varchar(128) null ,
  password varchar(128) null ,
  role varchar(128) null , 
  primary key (iduser) 
)
engine=InnoDB;





# -----------------------------------------------------------------------------
#       table : typetable
# -----------------------------------------------------------------------------

create table typetable (
  idtypetable integer not null auto_increment ,
  intitule varchar(128) null , 
  primary key (idtypetable) 
)
engine=InnoDB;




# -----------------------------------------------------------------------------
#       table : tablerestaurant
# -----------------------------------------------------------------------------

create table tablerestaurant (
  idtablerestaurant integer not null auto_increment ,
  idtypetable integer not null ,
  code varchar(128) null ,
  nbplaces varchar(128) null ,
  prix float null ,
  image text null , 
  primary key (idtablerestaurant) ,
  foreign key (idtypetable) references typetable(idtypetable)
)
engine=InnoDB;



# -----------------------------------------------------------------------------
#       table : typemenu
# -----------------------------------------------------------------------------

create table typemenu (
   idtypemenu integer not null  auto_increment ,
   intitule varchar(128) null , 
   primary key (idtypemenu) 
) 
engine=InnoDB;




# -----------------------------------------------------------------------------
#       table : menu
# -----------------------------------------------------------------------------

create table menu (
  idmenu integer not null auto_increment ,
  idtypemenu integer not null ,
  intitule varchar(128) null ,
  prix float null ,
  image text null , 
  primary key (idmenu) ,
  foreign key (idtypemenu) references typemenu(idtypemenu)
) 
engine=InnoDB;





# -----------------------------------------------------------------------------
#       table : commande
# -----------------------------------------------------------------------------

create table commande (
  idcommande integer not null auto_increment ,
  iduser integer not null ,
  idmenu integer not null ,
  qte integer null ,
  heure varchar(128) null ,
  datecommande date null , 
  etat varchar(128) null ,
  primary key (idcommande) ,
  foreign key (iduser) references user(iduser) ,
  foreign key (idmenu) references menu(idmenu) 
) 
engine=InnoDB;





# -----------------------------------------------------------------------------
#       table : reserver
# -----------------------------------------------------------------------------

create table reserver (
  idreserver integer not null auto_increment ,
  iduser integer not null ,
  idtablerestaurant integer not null , 
  nbheures integer null ,
  consignes text null ,
  modepaiement varchar(128) null ,
  etat varchar(128) null ,
  dateenregistrement date null ,
  datereservation date null ,
  primary key (idreserver),
  foreign key (iduser) references user(iduser) ,
  foreign key (idtablerestaurant) references tablerestaurant(idtablerestaurant)
) 
engine=InnoDB;


















# -----------------------------------------------------------------------------
#       Requetes : INSERTION
# -----------------------------------------------------------------------------

insert into user(nom, prenom, telephone, email, password, role)
values
("Admin", "Admin", "693909121", "admin@gmail.com", "admin", "Administrateur"),
("Serveur", "Serveur", "693909121", "serveur@gmail.com", "serveur", "Serveur"),
("Client", "Client", "693909121", "client@gmail.com", "client", "Client");


insert into typetable(intitule)
values
("VIP"),
("Standard"),
("Classique");


insert into tablerestaurant(idtypetable, code, nbplaces, prix, image)
values
(1,"Amour", 4, 2000, ""),
(2,"Fidelite", 3, 3000, ""),
(3,"Bonheur", 7, 10000, "");


insert into typemenu(intitule)
values
("Entrée"),
("Plat chaud"),
("Dessert");


insert into menu (idtypemenu,intitule,prix,image)
values
(1, "Salade", 3000, ""),
(2, "Poulet", 4000, ""),
(3, "Fruits", 3000, "");


insert into commande(iduser, idmenu, qte, heure, datecommande, etat)
values
(2, 1, 4, "12", NOW(), "En attente"),
(2, 2, 6, "21", NOW(), "En attente"),
(2, 3, 7, "14", NOW(), "En attente");


insert into reserver(iduser,idtablerestaurant,nbheures,consignes,modepaiement,etat,dateenregistrement,datereservation)
values
(1, 1, 12, "Je voudrais une table bleue blanc", "Cash", "Validée", NOW(), NOW()),
(1, 2, 7, "Je voudrais une nappe rouge", "Orange Money", "En attente", NOW(), NOW());

