create table Events (
    eventId integer primary key,
    year integer,
    month integer,
    date integer,
    season text,
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

