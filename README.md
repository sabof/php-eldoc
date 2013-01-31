# php-eldoc
eldoc backend for php.

Provides eldoc functionality for global functions, but not classes or methods.
Contains a list of standard php functions. It is also possilbe to access
function from a specific project/framework, it requires you to put probe.php
somehere in the project path.

Also provides a source for autocomplete

### Sample php-mode-hook:
```lisp
(defun php-mode-options ()
  (php-eldoc-enable)
  (cond
    ((string-match-p "^/my-project-folder")
     (php-eldoc-probe-load "http://my-project.com/probe.php?secret=sesame"))
    ((string-match-p "^/other-project-folder")
     (php-eldoc-probe-load "http://localhost/otherproject/probe.php?secret=sesame"))))
(add-hook 'php-mode-hook 'php-mode-options)
```
