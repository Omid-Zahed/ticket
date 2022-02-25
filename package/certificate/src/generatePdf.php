<?php
namespace Omidzahed\Certificate;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

/**
 * @method static generatePdf  getInstance
 */
class generatePdf
{

    protected string $path_exports,$path_assets;

    public function __construct($path_exports,$path_assets)
    {
        $this->path_exports=$path_exports;
        $this->path_assets=$path_assets;
    }



    public function creatPdfFromHtml($html,$output_file_name): bool
    {



        $process = new Process($this->generateCommand());
        $html=str_replace("{{assets}}",$this->path_assets,$html);
        $process->setInput($html);
        $process->mustRun();
        $pdf = $process->getOutput();
        $this->storePdfFile($pdf,$output_file_name);
        return  true;

    }

    protected  $footerHtml=null;
    public function setFootHtml($pathOrUrl): generatePdf
    {
        $this->footerHtml=$pathOrUrl;
        return $this;
    }

    protected  $headerHtml=null;
    public function setHeaderHtml($pathOrUrl): generatePdf
    {
        $this->headerHtml=$pathOrUrl;
        return $this;
    }


    protected function generateCommand(){
        $path=("./wkhtmltopdf");
        $commands=[$path];
        if ($this->footerHtml)
        {
            $commands[]='--footer-html';
            $commands[]=$this->footerHtml;

        }
        if ($this->headerHtml)
        {
            $commands[]="--header-html";
            $commands[]=$this->headerHtml;
        }
//
        $commands_string="--disable-smart-shrinking --page-height 250 --page-width 350 --margin-top 0 --margin-bottom 0 --margin-left 0 --margin-right 0";
        $commands_string=explode(" ",$commands_string);
        $commands= array_merge($commands,$commands_string);
        $commands[]="-";
        $commands[]="-";
        return  $commands;
    }
    protected function storePdfFile($pdf,$output_file_name){
        $path=$this->path_exports.'/'.$output_file_name.".pdf";
        $file= fopen($path,"w");
        fwrite($file,$pdf);
        fclose($file);
    }

}
