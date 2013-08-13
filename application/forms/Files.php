<?php
class Form_File extends Zend_Form
{
    public function init()
    {
        
        $this->setAction(BASE_URL.'/admin/library');
        $this->setAttrib('id', 'form1');
        $this->setAttrib('enctype', 'multipart/form-data');
        $file = $this->createElement('File', 'file[]');
        $title = $this->createElement('text', 'title[]');
        $summary = $this->createElement('textarea', 'descripion[]');
       // $file1->setLabel('Upload file1');
        $file->setDestination(APPLICATION_PATH.'/uploads');
        $file->addValidator(new Zend_Validate_File_FilesSize(array('min'=>1,
            'max'=>10000,'bytestring'=>true)));
        $file->addValidator(new Zend_Validate_File_Extension(array('jpg,gif,jpeg,png')));
        $this->addElement($file);
        $submit = $this->createElement('submit', 'Submit');
        $this->addElement($submit);
    }
      function isValid($data) {
        $_data = $this->getValues();
        $valid = parent::isValid($data);
        $this->populate($_data);
        return $valid;
    }
}
?>