
create table ASSISTANCE_REQUEST
(
   ASSISTANCE_REQUEST_ID             smallint not null AUTO_INCREMENT,
   REQUEST_DEVICE       varchar(25) not null,
   TIMESTAMP        timestamp not null,
   REQUEST_TYPE_OF_INCIDENT       varchar(50) not null,
   primary key (ASSISTANCE_REQUEST_ID)
) DEFAULT CHARSET=utf8;

create table REQUEST_SITE
(
   SITE_ID             smallint not null,
   ASSISTANCE_REQUEST_ID       smallint not null
) DEFAULT CHARSET=utf8;

create table REQUEST_GROUP
(
   GROUP_ID             smallint not null,
   ASSISTANCE_REQUEST_ID       smallint not null
) DEFAULT CHARSET=utf8;

create table GROUP_
(
   GROUP_ID             smallint not null AUTO_INCREMENT,
   primary key (GROUP_ID)
) DEFAULT CHARSET=utf8;

create table REQUEST_REQUEST_STATUS
(
   REQUEST_STATUS_ID             smallint not null,
   ASSISTANCE_REQUEST_ID       smallint not null
) DEFAULT CHARSET=utf8;

create table REQUEST_STATUS
(
   REQUEST_STATUS_ID             smallint not null AUTO_INCREMENT,
   STATUS       varchar(25) not null,
   primary key (REQUEST_STATUS_ID)
) DEFAULT CHARSET=utf8;

create table REQUEST_COMMUNICATION_PROTOCOL
(
    COMMUNICATION_PROTOCOL_ID             smallint not null,
    ASSISTANCE_REQUEST_ID       smallint not null
) DEFAULT CHARSET=utf8;

create table COMMUNICATION_PROTOCOL
(
   COMMUNICATION_PROTOCOL_ID             smallint not null AUTO_INCREMENT,
   PROTOCOL_TYPE       varchar(25) not null,
   primary key (COMMUNICATION_PROTOCOL_ID)
) DEFAULT CHARSET=utf8;

create table REQUEST_VICTIM_INFORMATION
(
    VICTIM_ID             smallint not null,
    ASSISTANCE_REQUEST_ID       smallint not null
) DEFAULT CHARSET=utf8;

create table VICTIM_INFORMATION
(
   VICTIM_ID             smallint not null AUTO_INCREMENT,
   NOTES       varchar(255),
   AUDIO_RECORDING        varchar(25),
   VIDEO_RECORDING        varchar(25),
   CHAT_HISTORY       varchar(255),
   primary key (VICTIM_ID)
) DEFAULT CHARSET=utf8;

create table REQUEST_LOGGED_ACTIONS
(
    ACTION_ID             smallint not null,
    ASSISTANCE_REQUEST_ID       smallint not null
) DEFAULT CHARSET=utf8;

create table LOGGED_ACTIONS
(
   ACTION_ID             smallint not null AUTO_INCREMENT,
   ACTION_TYPE       varchar(25) not null,
   primary key (ACTION_ID)
) DEFAULT CHARSET=utf8;

create table REQUEST_CALLER_INFORMATIONS
(
    CALLER_ID             smallint not null,
    ASSISTANCE_REQUEST_ID       smallint not null
) DEFAULT CHARSET=utf8;

create table CALLER_INFORMATIONS
(
   CALLER_ID             smallint not null AUTO_INCREMENT,
   VICTIM       boolean not null default false,
   CALLER_NAME         varchar(25),
   CALLER_SURNAME         varchar(25),
   CALLER_PHONE_NUMBER         varchar(25) not null,
   CALLER_NATIONALITY            varchar(25),
   CALLER_LOCATION         varchar(50) not null,
   primary key (CALLER_ID)
) DEFAULT CHARSET=utf8;
