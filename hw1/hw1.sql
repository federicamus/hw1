CREATE DATABASE hw1;
USE hw1;

CREATE TABLE UTENTI (
	nome VARCHAR(255),
    cognome VARCHAR(255),
    email VARCHAR(255),
    username VARCHAR(255) PRIMARY KEY,
    password VARCHAR(255)
);

SELECT * FROM UTENTI;

CREATE TABLE LIBRI (
	autore VARCHAR(255),
    titolo VARCHAR(255),
    data_di_pubblicazione INTEGER,
    pagine INTEGER,
    ISBN BIGINT PRIMARY KEY,
    img VARCHAR(255),
    descrizione VARCHAR(5000),
    costo FLOAT
);

SELECT * FROM LIBRI;

CREATE TABLE PREFERITI (
	username VARCHAR(255),
    foreign key (username) references UTENTI(username),
	autore VARCHAR(255),
    titolo VARCHAR(255),
    data_di_pubblicazione INTEGER,
    pagine INTEGER,
    ISBN BIGINT,
    foreign key (ISBN) references LIBRI(ISBN),
    img VARCHAR(255),
    description VARCHAR(5000),
    costo FLOAT,
    PRIMARY KEY (username, ISBN)
);

SELECT * FROM PREFERITI;

CREATE TABLE RECENSIONI (
	username VARCHAR(255),
    foreign key (username) references UTENTI(username),
    ISBN BIGINT,
    FOREIGN KEY (ISBN) REFERENCES LIBRI(ISBN),
    testo VARCHAR(500),
    PRIMARY KEY(username, ISBN)
);

SELECT * FROM RECENSIONI;

CREATE TABLE CARRELLO (
	username VARCHAR(255),
    foreign key (username) references UTENTI(username),
	autore VARCHAR(255),
    titolo VARCHAR(255),
    ISBN BIGINT,
    foreign key (ISBN) references LIBRI(ISBN),
    img VARCHAR(255),
    costo FLOAT,
    copie INTEGER,
    PRIMARY KEY (username, ISBN)
);

SELECT * FROM CARRELLO;

CREATE TABLE FATTURAZIONE (
	username VARCHAR(255) PRIMARY KEY,
	foreign key (username) references UTENTI(username),
    nome VARCHAR(255),
    cognome VARCHAR(255),
    indirizzo VARCHAR(255),
    info_aggiuntiva VARCHAR(255),
    CAP VARCHAR(5),
    citta VARCHAR(255),
    provincia VARCHAR(255),
    CF VARCHAR(16),
    telefono VARCHAR(15),
    tel_sec VARCHAR(15)
);

SELECT * FROM FATTURAZIONE;

CREATE TABLE PAGAMENTO (
	username VARCHAR(255),
	foreign key (username) references UTENTI(username),
    numero_carta VARCHAR(16),
    nome_carta VARCHAR(255),
    mese VARCHAR(2),
    anno VARCHAR(4),
    CVV VARCHAR(3),
    PRIMARY KEY (username, numero_carta)
);

SELECT * FROM PAGAMENTO;

CREATE TABLE ORDINE (
	username VARCHAR(255),
    foreign key (username) references UTENTI(username),
    numero_carta VARCHAR(16),
    totale FLOAT,
    cart_content json,
    billing_content json,
    data_spedizione date,
    data_arrivo date
);

SELECT * FROM ORDINE;