create table hebergement (
   heberg_id INT NOT NULL AUTO_INCREMENT,
   heberg_type VARCHAR(100),
   nb_places number(4),
   PRIMARY KEY ( heberg_id )
);

create table services (
   service_id INT NOT NULL AUTO_INCREMENT,
   heberg_type VARCHAR(100),
   service_nom VARCHAR(100),
   PRIMARY KEY ( service_id ),
   FOREIGN KEY ( heberg_type) REFERENCES hebergement (heberg_type) 
);

create table vip (
   vip_id INT NOT NULL AUTO_INCREMENT,
   vip_nom VARCHAR(100),
   vip_prenom VARCHAR(100),
   vip_job VARCHAR(100),
   vip_mail VARCHAR(100),
   vip_confirme BOOLEAN DEFAULT 0,
   date_d date,
   date_f date,
   PRIMARY KEY ( vip_id ) 
);

create table films (
   film_id INT NOT NULL AUTO_INCREMENT,
   titre VARCHAR(100),
   type VARCHAR(100),
   duree number(5),
   realisateur VARCHAR(100),
   PRIMARY KEY ( film_id )
);

create table jure (
   jure_id INT NOT NULL AUTO_INCREMENT,
   jure_nom VARCHAR(100),
   jure_prenom VARCHAR(100),
   jure_type VARCHAR(100),
   nb_films NUMBER(4),
   PRIMARY KEY ( jure_id )
);

create table jury (
   jury_id INT NOT NULL AUTO_INCREMENT,
   jury_type VARCHAR(100),
   jure ARRAYLIST,
   PRIMARY KEY ( jury_id )
);

create table lieux (
   lieu_id INT NOT NULL AUTO_INCREMENT,
   nom VARCHAR(100),
   jour date,
   heure_d datetime,
   heure_fin datetime,
   jury_id INT,
   film_id INT,
   PRIMARY KEY ( lieu_id ),
   FOREIGN KEY ( film_id) REFERENCES films (film_id),
   FOREIGN KEY ( jury_id) REFERENCES jury (jury_id)
);

create table reservations (
   resa_id INT NOT NULL AUTO_INCREMENT,
   vip_id VARCHAR(100),
   heberg_id VARCHAR(100),
   date_d date,
   date_f date,
   PRIMARY KEY ( resa_id )
);

create table users (
   user_id INT NOT NULL AUTO_INCREMENT,
   login VARCHAR(100),
   password VARCHAR(255),
   PRIMARY KEY ( user_id )
);
