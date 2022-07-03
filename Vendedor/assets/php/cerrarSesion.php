<?php
session_start();
session_destroy();
session_unset();

printf("<script>window.location.href = '../../index.html';</script>");