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
