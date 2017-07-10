
create table SITE
(
   SITE_ID             smallint not null AUTO_INCREMENT,
   SITE_NAME          varchar(25) not null,
   USER_AREA_OF_EXPERTISE          varchar(25) not null,
   primary key (SITE_ID)
) DEFAULT CHARSET=utf8;

create table ZNE
(
   ZNE_ID             smallint not null AUTO_INCREMENT,
   ZNE_ADMINISTRATIVE_CENTER         varchar(50) not null,
   ZNE_NUMBER          int not null,
   ZNE_DEPARTMENT_NUMBER          int not null,
   ZNE_DEPARTMENT_NAME        varchar(25) not null,
   ZNE_TERRITORY          varchar(50) not null,
   primary key (ZNE_ID)
) DEFAULT CHARSET=utf8;

create table SITE_ZNE
(
   ZNE_ID             smallint not null,
   SITE_ID        smallint not null
) DEFAULT CHARSET=utf8;
