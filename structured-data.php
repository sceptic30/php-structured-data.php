<?php
function structureddata() { //all below global variables are to you used from your php page it self
  global $page_title;
  global $description;
  global $page_url;
  $siteName = "Example"; //your site name
  global $datePublished;
  global $dateModified;
  global $str_data_images;
  global $site_root;
  $itemNumber = 1;
  $root_domain = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'].'/';
  $jsondata .= '<script type="application/ld+json">';
  $jsondata .= '{';
  $jsondata .= '"@context": "http://schema.org",';
  $jsondata .= '"@type": "NewsArticle",';
  $jsondata .= '"mainEntityOfPage": {';
  $jsondata .= '"@type": "WebPage",';
  $jsondata .= "\"@id\": \"{$page_url}\"";
  $jsondata .= '},';
  $jsondata .= "\"headline\": \"{$page_title}\",";
  $jsondata .= '"image": [';
    foreach ($str_data_images as $str_data_image) {
    $jsondata .= "$str_data_image,";
    }
  $jsondata = trim($jsondata,",");
  $jsondata .= '],';
  $jsondata .= "\"datePublished\": \"{$datePublished}\",";
  $jsondata .= "\"dateModified\": \"{$dateModified}\",";
  $jsondata .= '"author": {';
  $jsondata .= '"@type": "Person",';
  $jsondata .= "\"name\": \"{$siteName}\",";
  $jsondata .= "\"email\": \"mailto:admin@example.com\","; //your email address
  $jsondata .= "\"url\": \"https://example.com/contact/\""; // your contact page
  $jsondata .= '},';
  $jsondata .= '"publisher": {';
  $jsondata .= '"@type": "Organization",';
  $jsondata .= "\"name\": \"{$siteName}\",";
  $jsondata .= '"logo": {';
  $jsondata .= '"@type": "ImageObject",';
  $jsondata .= "\"url\": \"{$site_root}/static/images/logo.png\",";
  $jsondata .= '"width": "184",'; //your logo width
  $jsondata .= '"height": "60"'; // your lego height (must be 60px)
  $jsondata .= '}';
  $jsondata .= '},';
  $jsondata .= "\"description\": \"{$description}\"}";
  $jsondata .= '}';
  $jsondata .= '</script>';
  return $jsondata;
}
echo structureddata();
?>
