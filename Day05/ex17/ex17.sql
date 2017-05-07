SELECT count(*) AS 'nb_susc', FLOOR(AVG(price)) AS 'av_susc', MOD(SUM(duration_sub), 42) as 'ft'
	   FROM subscription;