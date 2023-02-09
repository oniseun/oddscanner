--
-- 1. Write a query to display the name (first_name and last_name) and department ID of all
-- employees in departments 30 or 100 in ascending order.
--

SELECT CONCAT(FIRST_NAME,' ',LAST_NAME) AS NAME, DEPARTMENT_ID 
FROM employees WHERE DEPARTMENT_ID IN(30, 100) 
ORDER BY CONCAT(FIRST_NAME,' ',LAST_NAME) ASC;