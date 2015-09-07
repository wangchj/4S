create table Events (
    eventId integer primary key,
    year integer,
    month integer,
    date integer,
    season text,
    title text,
    text text
);

create table Refs (
    refId integer primary key,
    title text,
    url text
);

create table EventRefs (
    eventId integer not null,
    refId integer not null,
    primary key (eventId, refId),
    foreign key (eventId) references Events(eventId),
    foreign key (refId) references Refs(refId)
);

create table Photos (
	photoId integer primary key,
	url text not null
);

create table EventPhotos (
	eventId integer not null,
	photoId integer not null,
	primary key (eventId, photoId),
	foreign key (eventId) references Events(eventId),
	foreign key (photoId) references Photos(photoId)
);

create table Users (
    userId integer primary key,
    email text not null unique,
    hash text not null,
    authKey text not null
);