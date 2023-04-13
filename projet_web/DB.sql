/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  04/12/2022 22:39:26                      */
/*==============================================================*/
drop DATABASE if exists gestion_de_stock;
CREATE DATABASE gestion_de_stock;
USE gestion_de_stock;

drop table if exists APPROVISIONNEMENTS;

drop table if exists CATEGORIE_PRODUIT;

drop table if exists CLIENT;

drop table if exists COMMANDE;

drop table if exists CONTIENT;

drop table if exists CONTIENT2;

drop table if exists FOURNISSEUR;

drop table if exists PRODUIT;



/*==============================================================*/
/* Table : administrateur                                       */
/*==============================================================*/
CREATE TABLE `administrateur` (
  `idadmin` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
);
INSERT INTO `administrateur` (`idadmin`, `login`, `password`) VALUES
(0, 'sa', '1234');

/*==============================================================*/
/* Table : APPROVISIONNEMENTS                                   */
/*==============================================================*/
create table APPROVISIONNEMENTS
(
   NUM_APR              int not null AUTO_INCREMENT,
   ID_F                 int not null,
   DATE                 date,
   primary key (NUM_APR)
);

/*==============================================================*/
/* Table : CATEGORIE_PRODUIT                                    */
/*==============================================================*/
create table CATEGORIE_PRODUIT
(
   REFERENCE_CAT        varchar(255),
   ID_CAT               int not null AUTO_INCREMENT,
  `DESC` text NOT NULL,
   primary key (ID_CAT)
);

/*==============================================================*/
/* Table : CLIENT                                               */
/*==============================================================*/
create table CLIENT
(
   ID_C                 int not null AUTO_INCREMENT,
   NOM                  char(255),
   ADRESSE              varchar(255),
   TELEPHONE            int,
   EMAIL                varchar(255),
   primary key (ID_C)
);

/*==============================================================*/
/* Table : COMMANDE                                             */
/*==============================================================*/
create table COMMANDE
(
   NUM_CMD              int not null AUTO_INCREMENT,
   ID_C                 int not null,
   DATE                 date,
   primary key (NUM_CMD)
);

/*==============================================================*/
/* Table : CONTIENT                                             */
/*==============================================================*/
create table CONTIENT
(
   REFERENCE            int not null,
   NUM_CMD              int not null,
   QTE_P                int,
   primary key (REFERENCE, NUM_CMD)
);

/*==============================================================*/
/* Table : CONTIENT2                                            */
/*==============================================================*/
create table CONTIENT2
(
   NUM_APR              int not null,
   REFERENCE            int not null,
   QTE_P                int,
   primary key (NUM_APR, REFERENCE)
);

/*==============================================================*/
/* Table : FOURNISSEUR                                          */
/*==============================================================*/
create table FOURNISSEUR
(
   ID_F                 int not null AUTO_INCREMENT,
   NOM                  char(255),
   ADRESSE              varchar(255),
   TELEPHONE            int,
   EMAIL                varchar(255),
   primary key (ID_F)
);

/*==============================================================*/
/* Table : PRODUIT                                              */
/*==============================================================*/
create table PRODUIT
(
   REFERENCE            int not null AUTO_INCREMENT,
   ID_CAT               int not null,
   LIBELLE              varchar(255),
   PRIX_U               decimal,
   QTE                  int,
   PRIX_A               decimal,
   PRIX_V               decimal,
   PHOTO                varchar(255),
  `DESC_PR` text NOT NULL,
   primary key (REFERENCE)
);

alter table APPROVISIONNEMENTS add constraint FK_FAIRE_F foreign key (ID_F)
      references FOURNISSEUR (ID_F) on delete cascade on update cascade;

alter table COMMANDE add constraint FK_FAIRE_C foreign key (ID_C)
      references CLIENT (ID_C) on delete cascade on update cascade;

alter table CONTIENT add constraint FK_CONTIENT foreign key (NUM_CMD)
      references COMMANDE (NUM_CMD) on delete cascade on update cascade;

alter table CONTIENT add constraint FK_CONTIENT4 foreign key (REFERENCE)
      references PRODUIT (REFERENCE) on delete cascade on update cascade;

alter table CONTIENT2 add constraint FK_CONTIENT2 foreign key (REFERENCE)
      references PRODUIT (REFERENCE) on delete cascade on update cascade;

alter table CONTIENT2 add constraint FK_CONTIENT3 foreign key (NUM_APR)
      references APPROVISIONNEMENTS (NUM_APR) on delete cascade on update cascade;

alter table PRODUIT add constraint FK_AVOIR foreign key (ID_CAT)
      references CATEGORIE_PRODUIT (ID_CAT) on delete cascade on update cascade;

