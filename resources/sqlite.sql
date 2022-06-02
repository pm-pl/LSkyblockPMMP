-- #! sqlite
-- # { island
-- #    { init
CREATE TABLE IF NOT EXISTS island
(
    id INTEGER PRIMARY KEY,
    username TEXT,
    members TEXT,
    pvp BOOL DEFAULT true
);
-- #    }
-- #    { insert
-- #        :id int
-- #        :username string
-- #        :members string
-- #        :members bool
INSERT OR REPLACE INTO island
(
    id,
    username,
    members,
    pvp
)VALUES(
    :id,
    :username,
    :members,
    :pvp
);
-- #    }
-- #    { select
-- #        :username string
SELECT members
FROM island
WHERE username=:username
-- #    }
-- #}