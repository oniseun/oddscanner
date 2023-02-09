--
-- 3. Write a query to find the name (first_name and last_name) and the salary of the employees
-- who earn more than the employee whose last name is Bell.
--

SELECT CONCAT(FIRST_NAME,' ',LAST_NAME) AS NAME, emp.SALARY 
FROM employees emp
INNER JOIN (SELECT SALARY FROM employees WHERE LAST_NAME = 'Bell' LIMIT 1) bell
WHERE emp.SALARY > bell.SALARY;
