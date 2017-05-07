INSERT INTO ft_table (login, creation_date, `group`)
	   SELECT last_name, birthdate, 'other' FROM user_card
	   		  WHERE last_name LIKE '%a%' AND char_length(last_name) < 9
	   		  ORDER BY last_name
	   		  LIMIT 10;