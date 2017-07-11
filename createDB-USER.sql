create table USER
(
   USER_ID             smallint not null AUTO_INCREMENT,
   USER_LOGIN          varchar(25) not null,
   USER_PWD          varchar(25) not null,
   USER_EMAIL       varchar(255) not null,
   USER_NAME          varchar(25) not null,
   USER_SURNAME          varchar(25) not null,
   USER_SERVICE          varchar(25) not null,
   USER_COUNTRY        varchar(255) not null,
   USER_IS_VALIDATED        boolean not null,
   primary key (USER_ID)
) DEFAULT CHARSET=utf8;

create table USER_AVAILABILITY
(
   USER_ID        smallint not null,
   AVAILABILTY_ID       smallint not null
)  DEFAULT CHARSET=utf8;

create table AVAILABILITY
(
   AVAILABILTY_ID       smallint not null AUTO_INCREMENT,
   AVAILABILTY_NAME       varchar(25) not null,
   primary key (AVAILABILTY_ID)
)  DEFAULT CHARSET=utf8;

create table USER_ADMINISTRATION_ROLE
(
   ADMINISTRATION_ROLE_ID        smallint not null,
   USER_ID       smallint not null
)  DEFAULT CHARSET=utf8;

create table ADMINISTRATION_ROLE
(
   ADMINISTRATION_ROLE_ID        smallint not null AUTO_INCREMENT,
   ADMINISTRATION_ROLE_NAME        varchar(25) not null,
   primary key (ADMINISTRATION_ROLE_ID)
)  DEFAULT CHARSET=utf8;

create table ADMINISTRATION_ROLE_RIGHT
  (
     ADMINISTRATION_ROLE_ID        smallint not null,
     RIGHT_ID       smallint not null
  )  DEFAULT CHARSET=utf8;

create table RIGHT_
  (
     RIGHT_ID       smallint not null AUTO_INCREMENT,
     RIGHT_NAME       varchar(25) not null,
     primary key (RIGHT_ID)
  )  DEFAULT CHARSET=utf8;


create table USER_SKILLS
  (
     SKILL_ID        smallint not null,
     USER_ID       smallint not null
  )  DEFAULT CHARSET=utf8;

create table SKILL
  (
     SKILL_ID        smallint not null AUTO_INCREMENT,
     SKILL_NAME      varchar(25) not null,
     primary key (SKILL_ID)
  )  DEFAULT CHARSET=utf8;

create table USER_REQUEST
  (
     USER_ID        smallint not null,
     ASSISTANCE_REQUEST_ID       smallint not null
  )  DEFAULT CHARSET=utf8;

create table USER_SITE
  (
     USER_ID        smallint not null,
     SITE_ID       smallint not null
  )  DEFAULT CHARSET=utf8;

  create table USER_LOCATION
  (
     USER_LOCATION_ID             smallint not null AUTO_INCREMENT,
     USER_ID           smallint not null,
     USER_DEPARTMENT_NAME          varchar(255) not null,
     USER_DEPARTMENT_NUMBER       integer not null,
     USER_TOWN         varchar(255) not null,
     USER_POSTCODE        integer not null,

     primary key (USER_LOCATION_ID)
  ) DEFAULT CHARSET=utf8;
