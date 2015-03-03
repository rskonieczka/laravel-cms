<?php
namespace Tests\Zend\Validate;

class ValidateTest extends \Tests\TestCase
{
    /**
     * Ensure that the composer autoloader is finding the classes correctly.
     */
    public function testCanFindClasses()
    {
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_AdapterAbstract') || interface_exists('\Zend_Validate_Barcode_AdapterAbstract'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_AdapterInterface') || interface_exists('\Zend_Validate_Barcode_AdapterInterface'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Code25') || interface_exists('\Zend_Validate_Barcode_Code25'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Code25interleaved') || interface_exists('\Zend_Validate_Barcode_Code25interleaved'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Code39') || interface_exists('\Zend_Validate_Barcode_Code39'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Code39ext') || interface_exists('\Zend_Validate_Barcode_Code39ext'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Code93') || interface_exists('\Zend_Validate_Barcode_Code93'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Code93ext') || interface_exists('\Zend_Validate_Barcode_Code93ext'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Ean2') || interface_exists('\Zend_Validate_Barcode_Ean2'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Ean5') || interface_exists('\Zend_Validate_Barcode_Ean5'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Ean8') || interface_exists('\Zend_Validate_Barcode_Ean8'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Ean12') || interface_exists('\Zend_Validate_Barcode_Ean12'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Ean13') || interface_exists('\Zend_Validate_Barcode_Ean13'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Ean14') || interface_exists('\Zend_Validate_Barcode_Ean14'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Ean18') || interface_exists('\Zend_Validate_Barcode_Ean18'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Gtin12') || interface_exists('\Zend_Validate_Barcode_Gtin12'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Gtin13') || interface_exists('\Zend_Validate_Barcode_Gtin13'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Gtin14') || interface_exists('\Zend_Validate_Barcode_Gtin14'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Identcode') || interface_exists('\Zend_Validate_Barcode_Identcode'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Intelligentmail') || interface_exists('\Zend_Validate_Barcode_Intelligentmail'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Issn') || interface_exists('\Zend_Validate_Barcode_Issn'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Itf14') || interface_exists('\Zend_Validate_Barcode_Itf14'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Leitcode') || interface_exists('\Zend_Validate_Barcode_Leitcode'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Planet') || interface_exists('\Zend_Validate_Barcode_Planet'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Postnet') || interface_exists('\Zend_Validate_Barcode_Postnet'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Royalmail') || interface_exists('\Zend_Validate_Barcode_Royalmail'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Sscc') || interface_exists('\Zend_Validate_Barcode_Sscc'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Upca') || interface_exists('\Zend_Validate_Barcode_Upca'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode_Upce') || interface_exists('\Zend_Validate_Barcode_Upce'));
        $this->assertTrue(class_exists('\Zend_Validate_Db_Abstract') || interface_exists('\Zend_Validate_Db_Abstract'));
        $this->assertTrue(class_exists('\Zend_Validate_Db_NoRecordExists') || interface_exists('\Zend_Validate_Db_NoRecordExists'));
        $this->assertTrue(class_exists('\Zend_Validate_Db_RecordExists') || interface_exists('\Zend_Validate_Db_RecordExists'));
        $this->assertTrue(class_exists('\Zend_Validate_File_Count') || interface_exists('\Zend_Validate_File_Count'));
        $this->assertTrue(class_exists('\Zend_Validate_File_Crc32') || interface_exists('\Zend_Validate_File_Crc32'));
        $this->assertTrue(class_exists('\Zend_Validate_File_ExcludeExtension') || interface_exists('\Zend_Validate_File_ExcludeExtension'));
        $this->assertTrue(class_exists('\Zend_Validate_File_ExcludeMimeType') || interface_exists('\Zend_Validate_File_ExcludeMimeType'));
        $this->assertTrue(class_exists('\Zend_Validate_File_Exists') || interface_exists('\Zend_Validate_File_Exists'));
        $this->assertTrue(class_exists('\Zend_Validate_File_Extension') || interface_exists('\Zend_Validate_File_Extension'));
        $this->assertTrue(class_exists('\Zend_Validate_File_FilesSize') || interface_exists('\Zend_Validate_File_FilesSize'));
        $this->assertTrue(class_exists('\Zend_Validate_File_Hash') || interface_exists('\Zend_Validate_File_Hash'));
        $this->assertTrue(class_exists('\Zend_Validate_File_ImageSize') || interface_exists('\Zend_Validate_File_ImageSize'));
        $this->assertTrue(class_exists('\Zend_Validate_File_IsCompressed') || interface_exists('\Zend_Validate_File_IsCompressed'));
        $this->assertTrue(class_exists('\Zend_Validate_File_IsImage') || interface_exists('\Zend_Validate_File_IsImage'));
        $this->assertTrue(class_exists('\Zend_Validate_File_Md5') || interface_exists('\Zend_Validate_File_Md5'));
        $this->assertTrue(class_exists('\Zend_Validate_File_MimeType') || interface_exists('\Zend_Validate_File_MimeType'));
        $this->assertTrue(class_exists('\Zend_Validate_File_NotExists') || interface_exists('\Zend_Validate_File_NotExists'));
        $this->assertTrue(class_exists('\Zend_Validate_File_Sha1') || interface_exists('\Zend_Validate_File_Sha1'));
        $this->assertTrue(class_exists('\Zend_Validate_File_Size') || interface_exists('\Zend_Validate_File_Size'));
        $this->assertTrue(class_exists('\Zend_Validate_File_Upload') || interface_exists('\Zend_Validate_File_Upload'));
        $this->assertTrue(class_exists('\Zend_Validate_File_WordCount') || interface_exists('\Zend_Validate_File_WordCount'));
        $this->assertTrue(class_exists('\Zend_Validate_Ldap_Dn') || interface_exists('\Zend_Validate_Ldap_Dn'));
        $this->assertTrue(class_exists('\Zend_Validate_Sitemap_Changefreq') || interface_exists('\Zend_Validate_Sitemap_Changefreq'));
        $this->assertTrue(class_exists('\Zend_Validate_Sitemap_Lastmod') || interface_exists('\Zend_Validate_Sitemap_Lastmod'));
        $this->assertTrue(class_exists('\Zend_Validate_Sitemap_Loc') || interface_exists('\Zend_Validate_Sitemap_Loc'));
        $this->assertTrue(class_exists('\Zend_Validate_Sitemap_Priority') || interface_exists('\Zend_Validate_Sitemap_Priority'));
        $this->assertTrue(class_exists('\Zend_Validate_Abstract') || interface_exists('\Zend_Validate_Abstract'));
        $this->assertTrue(class_exists('\Zend_Validate_Alnum') || interface_exists('\Zend_Validate_Alnum'));
        $this->assertTrue(class_exists('\Zend_Validate_Alpha') || interface_exists('\Zend_Validate_Alpha'));
        $this->assertTrue(class_exists('\Zend_Validate_Barcode') || interface_exists('\Zend_Validate_Barcode'));
        $this->assertTrue(class_exists('\Zend_Validate_Between') || interface_exists('\Zend_Validate_Between'));
        $this->assertTrue(class_exists('\Zend_Validate_Callback') || interface_exists('\Zend_Validate_Callback'));
        $this->assertTrue(class_exists('\Zend_Validate_Ccnum') || interface_exists('\Zend_Validate_Ccnum'));
        $this->assertTrue(class_exists('\Zend_Validate_CreditCard') || interface_exists('\Zend_Validate_CreditCard'));
        $this->assertTrue(class_exists('\Zend_Validate_Date') || interface_exists('\Zend_Validate_Date'));
        $this->assertTrue(class_exists('\Zend_Validate_Digits') || interface_exists('\Zend_Validate_Digits'));
        $this->assertTrue(class_exists('\Zend_Validate_EmailAddress') || interface_exists('\Zend_Validate_EmailAddress'));
        $this->assertTrue(class_exists('\Zend_Validate_Exception') || interface_exists('\Zend_Validate_Exception'));
        $this->assertTrue(class_exists('\Zend_Validate_Float') || interface_exists('\Zend_Validate_Float'));
        $this->assertTrue(class_exists('\Zend_Validate_GreaterThan') || interface_exists('\Zend_Validate_GreaterThan'));
        $this->assertTrue(class_exists('\Zend_Validate_Hex') || interface_exists('\Zend_Validate_Hex'));
        $this->assertTrue(class_exists('\Zend_Validate_Hostname') || interface_exists('\Zend_Validate_Hostname'));
        $this->assertTrue(class_exists('\Zend_Validate_Iban') || interface_exists('\Zend_Validate_Iban'));
        $this->assertTrue(class_exists('\Zend_Validate_Identical') || interface_exists('\Zend_Validate_Identical'));
        $this->assertTrue(class_exists('\Zend_Validate_InArray') || interface_exists('\Zend_Validate_InArray'));
        $this->assertTrue(class_exists('\Zend_Validate_Int') || interface_exists('\Zend_Validate_Int'));
        $this->assertTrue(class_exists('\Zend_Validate_Interface') || interface_exists('\Zend_Validate_Interface'));
        $this->assertTrue(class_exists('\Zend_Validate_Ip') || interface_exists('\Zend_Validate_Ip'));
        $this->assertTrue(class_exists('\Zend_Validate_Isbn') || interface_exists('\Zend_Validate_Isbn'));
        $this->assertTrue(class_exists('\Zend_Validate_LessThan') || interface_exists('\Zend_Validate_LessThan'));
        $this->assertTrue(class_exists('\Zend_Validate_NotEmpty') || interface_exists('\Zend_Validate_NotEmpty'));
        $this->assertTrue(class_exists('\Zend_Validate_PostCode') || interface_exists('\Zend_Validate_PostCode'));
        $this->assertTrue(class_exists('\Zend_Validate_Regex') || interface_exists('\Zend_Validate_Regex'));
        $this->assertTrue(class_exists('\Zend_Validate_StringLength') || interface_exists('\Zend_Validate_StringLength'));
        $this->assertTrue(class_exists('\Zend_Validate') || interface_exists('\Zend_Validate'));
    }
}