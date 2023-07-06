SELECT posts.post_title as course,
rel.meta_key as user,
rel.meta_value as score,
posts.ID as course_id 
FROM wp_posts AS posts 
LEFT JOIN wp_postmeta AS rel ON posts.ID = rel.post_id
WHERE posts.post_type = 'course' 
AND posts.post_status = 'publish' 
AND rel.meta_key REGEXP '^[0-9]+$' 
ORDER BY rel.meta_key

// query to get users that doesn't have any course
SELECT DISTINCT user.ID AS user_id, 
user.display_name as user_name
FROM wp_users AS user
WHERE user.ID NOT IN (
  SELECT DISTINCT user_id
  FROM wp_usermeta
  INNER JOIN wp_posts AS post ON post.ID = meta_key
  WHERE meta_key = post.ID
)
ORDER BY user.ID
