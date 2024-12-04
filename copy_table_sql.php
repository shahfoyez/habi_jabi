INSERT INTO foyez_portfolio.feedback (id, name, position, photo, description, status, created_at, updated_at)
SELECT id, name, position, '', description, '', created_at, updated_at
FROM portfolio_web_laravel.feedback;
