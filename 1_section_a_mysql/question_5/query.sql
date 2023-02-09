--
-- 5.  Write a query to get the department name and number of employees in the department.
--

SELECT 
dep.DEPARTMENT_NAME, 
(SELECT COUNT(*) AS emp_count FROM employees emp WHERE emp.DEPARTMENT_ID = dep.DEPARTMENT_ID LIMIT 1) AS NUMBER_OF_EMPLOYEES
FROM departments dep;

