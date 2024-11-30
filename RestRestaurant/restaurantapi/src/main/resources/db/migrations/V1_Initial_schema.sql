-- Create the reservation table
CREATE TABLE reservation (
    id BIGINT NOT NULL PRIMARY KEY,
    table_id BIGINT NOT NULL,
    user_id BIGINT NOT NULL,
    date_time TIMESTAMP NOT NULL,
    duration INT NOT NULL,
    number_of_people INT NOT NULL
);