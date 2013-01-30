# php-eldoc
eldoc backend for php.

### Sample php-mode-hook:

(defun php-mode-options ()
  (php-eldoc-enable)
  (cond
    ((string-match-p "^/my-project-folder")
     (php-eldoc-probe-load "http://my-project.com/probe.php?secret=sesame"))
    ((string-match-p "^/other-project-folder")
     (php-eldoc-probe-load "http://localhost/otherproject/probe.php?secret=sesame"))))
