SELECT `id`, `slug`, `title`, `h1`, `p`, `span_class`, `span_text`, `img_alt`, `img_src`, `nav_title` FROM `page` WHERE 'slug' = 'teletubbies';

INSERT INTO `page`(
`slug`,
`title`,
`h1`,
`p`,
`span_class`,
`span_text`,
`img_alt`,
`img_src`,
`nav_title`
)

VALUES (
  'teletubbies',
  'teletubbies',
  'Teletubbies',
  'Ca fait peur',
  'label-danger',
  'Danger',
  'Eloignez les enfants',
  'teletubbies',
  'teletubbies'


)

