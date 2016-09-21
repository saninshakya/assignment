A table containing the enrollment year has incorrect data in records with ids between 20 and 100.

Select all queries below that, for the faulty records, set the year to 2015.


UPDATE enrollments SET year = 2015 WHERE id IN (20, 100);
UPDATE enrollments SET year = 2015 WHERE id >= 20 AND id <= 100;
UPDATE enrollments SET year = 2015 WHERE id BETWEEN 20 AND 100;
UPDATE enrollments SET year = 2015 WHERE id >= 20 OR id <= 100;