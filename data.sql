create database evaluation;


create table admin(
    email varchar(50) not null,
    mdp varchar(50) not null
    );

    create table type(
        idType serial not null,
        type varchar(50) not null,
        primary key(idType)
    );

    create table voiture(
        idVoiture serial not null,
        numero varchar(50) not null,
        marque varchar(50) not null,
        modele varchar(50) not null,
        idtype int not null,
        primary key(idVoiture),
        foreign key(idtype) references type(idtype)
    );

    -- create table trajet(
    --     idTrajet int not null,
    --     DebutFinDutrajet int not null,
    --     Kilometrage int not null,
    --     primary key(idTrajet)
    -- );

    create table carburant(
        idCarburant int not null,
        montant int not null,
        quantite int not null,
        idCarnet int not null,
        primary key(idCarburant),
        foreign key(idCarnet) references carnet(idCarnet)
    );


    create table carnet(
        idCarnet serial not null,
        LieuTrajet varchar(100) not null,
        idChauffeur int not null,
        idVoiture int not null,
        typeDuTrajet int not null,
        dateDeDepart date not null,
        heureDeDepart time not null,
        finDeDepart date not null,
        primary key(idCarnet),
        foreign key(idVoiture) references voiture(idVoiture),
        foreign key(idChauffeur) references Chauffeur(idChauffeur)
    );


create table assurance(
    idAssurance int not null,
    idVoiture int not null,
    dateFin date not null,
    primary key(idAssurance),
    foreign key(idVoiture) references voiture(idVoiture)
);

create table visiteTechnique(
    idVisiteTechnique int not null,
    idVoiture int not null,
    dateFin date not null,
    primary key(idVisiteTechnique),
    foreign key(idVoiture) references voiture(idVoiture)
);

create table echeance(
    idEcheance int not null,
    idAssurance int not null,
    idVisiteTechnique int not null,
    primary key()
);

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
