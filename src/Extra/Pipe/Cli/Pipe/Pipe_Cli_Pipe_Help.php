<?php

class Pipe_Cli_Pipe_Help {
    public function process($input, $output) {
        $success = true;

        $message = '';
        $option = $input->getFrom($input->params, 'on-unknown-option');
        if ($option) {
            $message .= 'Error: Missing or unknown option \'' . $option[0] . '\'.'. EOL;
        }

        $message .= 'Usage: php [file] pipe [option]' . EOL;
        $message .= 'Options:' . EOL;
        $message .= '  create [name]   create pipe using --path=[value] --args=[value]' . EOL;
        $output->content = $message;
        $output->code = 1;

        return array($input, $output, $success);
    }
}
