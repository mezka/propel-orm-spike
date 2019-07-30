
-----------------------------------------------------------------------
-- follows
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [follows];

CREATE TABLE [follows]
(
    [id] INTEGER NOT NULL,
    [created_at] TIMESTAMP,
    [updated_at] TIMESTAMP,
    PRIMARY KEY ([id]),
    UNIQUE ([id])
);

-----------------------------------------------------------------------
-- liked_medias
-----------------------------------------------------------------------

DROP TABLE IF EXISTS [liked_medias];

CREATE TABLE [liked_medias]
(
    [id] INTEGER NOT NULL,
    [profile_id] INTEGER NOT NULL,
    PRIMARY KEY ([id]),
    UNIQUE ([id]),
    FOREIGN KEY ([profile_id]) REFERENCES [follows] ([id])
);
