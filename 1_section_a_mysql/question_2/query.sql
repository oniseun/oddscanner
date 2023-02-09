--
-- 2. Write a query to find the manager ID and the salary of the lowest-paid employee for that
-- manager.
--

SELECT MANAGER_ID, MIN(SALARY) AS SALARY
FROM employees 
GROUP BY MANAGER_ID;
