create database transport;
use transport;


-- create table visiteTechnique(
--     idVisiteTechnique int not null,
--     idVoiture int not null,
--     dateFin date not null,
--     primary key(idVisiteTechnique),
--     foreign key(idVoiture) references voiture(idVoiture)
-- );

-- create table echeance(
--     idEcheance int not null,
--     idAssurance int not null,
--     idVisiteTechnique int not null,
--     primary key()
-- );

insert into admins(email,password) values("admin@gmail.com","admin@gmail.com");

-- exemplaire
insert into types(type) values("Camion");
insert into types(type) values("Sprinter");


create view disponible
    as select
    dispos.type,
    voitures.id,
    voitures.marque,
    voitures.numero
    from voitures
     join dispos on voitures.id = dispos.voiture_id;




create view view_Trajets
    as select
     chauffeurs.nomChauffeur,
     voitures.marque,
     trajets.voiture_id,
     trajets.chauffeur_id,
     trajets.debutKilometrage,
     trajets.arriveKilometrage,
     trajets.dateDepart
      from trajets
     join voitures on trajets.voiture_id = voitures.id
     join chauffeurs on trajets.chauffeur_id = chauffeurs.id;





create view histogramme
    as select
     nomChauffeur,marque,chauffeur_id, voiture_id,debutKilometrage,arriveKilometrage, (arriveKilometrage-debutKilometrage) as DistanceParcourue , dateDepart
    from view_Trajets ;
