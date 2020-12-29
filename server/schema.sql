CREATE TABLE Users (
	id UUID PRIMARY KEY NOT NULL,
	login VARCHAR(48) UNIQUE NOT NULL,
	password varchar(60),
    email VARCHAR(255),
    created_at TIMESTAMP
);

CREATE TABLE Posts (
    id UUID PRIMARY KEY NOT NULL,
    author UUID NOT NULL,
    body TEXT,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

CREATE TABLE Followers (
    uid UUID,
    fid UUID
);
