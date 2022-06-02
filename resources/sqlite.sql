-- #! sqlite
-- # { island
-- #    { init
CREATE TABLE IF NOT EXISTS skyblock
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
INSERT OR REPLACE INTO skyblock
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
SELECT *
FROM skyblock
WHERE username=:username
-- #    }
-- #}
