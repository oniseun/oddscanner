--
-- 4. Write a query to find the name (first_name and last_name), job, department ID and name of
-- all employees that work in London.
--

SELECT CONCAT(FIRST_NAME,' ',LAST_NAME) AS NAME, jb.JOB_TITLE AS JOB, emp.DEPARTMENT_ID, dep.DEPARTMENT_NAME
FROM employees emp
LEFT JOIN departments dep ON emp.DEPARTMENT_ID = dep.DEPARTMENT_ID
LEFT JOIN locations loc ON loc.LOCATION_ID = dep.LOCATION_ID
LEFT JOIN jobs jb ON emp.JOB_ID = jb.JOB_ID
WHERE loc.CITY = 'London';
