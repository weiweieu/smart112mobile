create table JURISDICTION
(
   JURISDICTION_ID             smallint not null AUTO_INCREMENT,
   JURISDICTION_COUNTRY       varchar(25) not null,
   primary key (JURISDICTION_ID)
) DEFAULT CHARSET=utf8;

create table JURISDICTION_FALLBACK_JURISDICTION
(
    JURISDICTION_ID             smallint not null,
    FALLBACK_JURISDICTION_ID        smallint not null /*FALLBACK_JURISDICTION is an element from JURISDICTION*/
) DEFAULT CHARSET=utf8;

create table SITE_JURISDICTION
(
    JURISDICTION_ID             smallint not null,
    SITE_ID        smallint not null
) DEFAULT CHARSET=utf8;

create table JURISDICTION_TOWN
(
    JURISDICTION_ID             smallint not null,
    TOWN_ID        smallint not null
) DEFAULT CHARSET=utf8;

create table TOWN
(
    TOWN_ID             smallint not null AUTO_INCREMENT,
    TOWN_INSEE        int not null,
    TOWN_NAME       varchar(255) not null,
    TOWN_POSTCODE       int not null,
    TOWN_ROUTING_LABEL    varchar(255) not null,
    TOWN_DELEGATED_TOWN       varchar(255) not null,
    TOWN_GPS_COORDINATE       varchar(255) not null,
    primary key (TOWN_ID)
) DEFAULT CHARSET=utf8;

create table JURISDICTION_0ZAB
(
    JURISDICTION_ID             smallint not null,
    0ZAB_ID        smallint not null
) DEFAULT CHARSET=utf8;

create table 0ZAB
(
    0ZAB_ID             smallint not null AUTO_INCREMENT,
    0ZAB_REGION       varchar(255) not null,
    0ZAB_COMMENT       varchar(255) not null,
    primary key (0ZAB_ID)
) DEFAULT CHARSET=utf8;

create table 0ZAB_DEPARTMENT
(
    DEPARTMENT_ID             smallint not null,
    0ZAB_ID        smallint not null
) DEFAULT CHARSET=utf8;

create table DEPARTMENT
(
    DEPARTMENT_ID             smallint not null AUTO_INCREMENT,
    DEPARTMENT_NUMBER       int not null,
    DEPARTMENT_NAME         varchar(255) not null,
    DEPARTMENT_COUNTRY          varchar(255) not null,
    primary key (DEPARTMENT_ID)
) DEFAULT CHARSET=utf8;

create table 0ZAB_0ZAB_NUMBERS
(
    0ZAB_NUMBER_ID             smallint not null,
    0ZAB_ID        smallint not null
) DEFAULT CHARSET=utf8;

create table 0ZAB_NUMBERS
(
    0ZAB_NUMBERS_ID             smallint not null AUTO_INCREMENT,
    0ZAB_NUMBERS       int not null,
    primary key (0ZAB_NUMBERS_ID)
) DEFAULT CHARSET=utf8;

create table JURISDICTION_BUILDING
(
    BUILDING_ID             smallint not null,
    JURISDICTION_ID        smallint not null
) DEFAULT CHARSET=utf8;

create table BUILDING
(
    BUILDING_ID             smallint not null AUTO_INCREMENT,
    BUILDING_NAME       varchar(25),
    BUILDING_NUMBER       int,
    primary key (BUILDING_ID)
) DEFAULT CHARSET=utf8;

create table JURISDICTION_NEIGHBOURHOOD
(
    STREET_ID             smallint not null,
    JURISDICTION_ID        smallint not null
) DEFAULT CHARSET=utf8;

create table JURISDICTION_STREET
(
    STREET_ID             smallint not null AUTO_INCREMENT,
    STREET_NAME        varchar(25) not null,
    STREET_TOWN_NAME        varchar(25),
    primary key (STREET_ID)
) DEFAULT CHARSET=utf8;

create table JURISDICTION_SERVICES
(
    JURISDICTION_ID             smallint not null,
    SERVICE_ID        smallint not null

) DEFAULT CHARSET=utf8;

create table SERVICES
(
    SERVICE_ID             smallint not null AUTO_INCREMENT,
    SERVICE_NAME        varchar(25) not null,
    primary key (SERVICE_ID)
) DEFAULT CHARSET=utf8;
