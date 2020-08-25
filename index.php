<?php

echo filter_var($_GET["name"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);