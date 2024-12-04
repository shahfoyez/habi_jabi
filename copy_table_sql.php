INSERT INTO foyez_portfolio.feedback (id, name, position, photo, description, status)
SELECT id, name, position,description
FROM portfolio_web_laravel.feedback;
