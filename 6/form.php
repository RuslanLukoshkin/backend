<!DOCTYPE html>
<html lang="">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <title>5</title>
</head>

<body>
    <?php
    if (!empty($messages)) {
        print('<div id="messages">');
        foreach ($messages as $message) {
            print($message);
        }
        print('</div>');
    }
    ?>
    <div class="form-container">
        <form method="POST" action="">
            <a href="login.php?logout=1" <?php (empty($_SESSION['uid'])) ? print('style="display:none"') : print('style="display:inline-block"'); ?>>Выйти</a>
            <div class="block">
                <span class="block-title">Имя</span>
                <input type="text" class="form-control" name="name" aria-describedby="basic-addon1" placeholder="Понтий Пилат" <?php if ($errors['name']) {
                                                                                                                                    print 'class="error"';
                                                                                                                                } ?> value="<?php print $values['name']; ?>" />
            </div>
            <div class="block">
                <span class="block-title">Email</span>
                <input type="text" class="form-control" name="email" aria-describedby="basic-addon2" placeholder="master@mail.com" <?php if ($errors['email']) {
                                                                                                                                        print 'class="error"';
                                                                                                                                    } ?> value="<?php print $values['email']; ?>" />
            </div>
            <div class="block" id="date-block">
                <span class="block-title">Дата рождения</span>
                <input type="date" class="form-control" aria-describedby="basic-addon3" name="date" <?php if ($errors['date']) {
                                                                                                        print 'class="error"';
                                                                                                    } ?> value="<?php print $values['date']; ?>" />
            </div>
            <div class="block" id="gender-block">
                <span class="block-title">Пол</span>
                <div class="radios">
                    <div class="male-radio">
                        <input class="form-check-input" type="radio" name="gender" value="m" <?php if ($values['gender'] == 'm') {
                                                                                                    print 'checked';
                                                                                                }; ?> />
                        <label class="form-check-label" for="male">Мужской</label>
                    </div>
                    <div class="female-radio">
                        <input class="form-check-input" type="radio" name="gender" value="f" <?php if ($values['gender'] == 'f') {
                                                                                                    print 'checked';
                                                                                                }; ?> />
                        <label class="form-check-label" for="female">Женский</label>
                    </div>
                </div>
            </div>
            <div class="block" id="limbs-block">
                <span class="block-title">Конечности</span>
                <div class="radios">
                    <div class="limbs-radio">
                        <input class="form-check-input" type="radio" name="limbs" value="1" <?php if ($values['limbs'] == '1') {
                                                                                                print 'checked';
                                                                                            }; ?> />
                        <label class="form-check-label" for="male">1</label>
                    </div>
                    <div class="limbs-radio">
                        <input class="form-check-input" type="radio" name="limbs" value="2" <?php if ($values['limbs'] == '2') {
                                                                                                print 'checked';
                                                                                            }; ?> />
                        <label class="form-check-label" for="female">2</label>
                    </div>
                    <div class="limbs-radio">
                        <input class="form-check-input" type="radio" name="limbs" value="3" <?php if ($values['limbs'] == '3') {
                                                                                                print 'checked';
                                                                                            }; ?> />
                        <label class="form-check-label" for="female">3</label>
                    </div>
                    <div class="limbs-radio">
                        <input class="form-check-input" type="radio" name="limbs" value="4" <?php if ($values['limbs'] == '4') {
                                                                                                print 'checked';
                                                                                            }; ?> />
                        <label class="form-check-label" for="female">4</label>
                    </div>
                </div>
            </div>
            <div class="block">
                <span class="block-title">Ваша свита</span>
                <select class="form-select form-select-lg mb-2" name="powers[]" multiple <?php if ($errors['powers']) {
                                                                                                print 'class="error"';
                                                                                            } ?>>
                    <option value="brain" <?php $arr = explode(',', $values['powers']);
                                            if ($arr != '') {
                                                foreach ($arr as $value) {
                                                    if ($value == "brain") {
                                                        print 'selected';
                                                    }
                                                }
                                            }
                                            ?>>Воланд</option>
                    <option value="magic" <?php $arr = explode(',', $values['powers']);
                                            if ($arr != '') {
                                                foreach ($arr as $value) {
                                                    if ($value == "magic") {
                                                        print 'selected';
                                                    }
                                                }
                                            }
                                            ?>>Фагот</option>
                    <option value="guns" <?php $arr = explode(',', $values['powers']);
                                            if ($arr != '') {
                                                foreach ($arr as $value) {
                                                    if ($value == "guns") {
                                                        print 'selected';
                                                    }
                                                }
                                            }
                                            ?>>Азазелло</option>
                    <option value="fun" <?php $arr = explode(',', $values['powers']);
                                        if ($arr != '') {
                                            foreach ($arr as $value) {
                                                if ($value == "fun") {
                                                    print 'selected';
                                                }
                                            }
                                        }
                                        ?>>Бегемот</option>
                </select>
            </div>
            <div class="block">
                <span class="block-title">Биография</span>
                <textarea class="form-control" placeholder="Расскажите о себе..." name="bio" <?php if ($errors['bio']) {
                                                                                                    print 'class="error"';
                                                                                                } ?>><?php print $values['bio']; ?></textarea>
            </div>
            <div class="form-check policy">
                <input class="form-check-input" type="checkbox" value="y" id="policy" name="policy" checked />
                <label class="form-check-label" for="policy">Согласен с контрактом отправки данных.</label>
            </div>
            <button class="btn btn-primary" type="submit" id="send-btn">Телеграфировать</button>
        </form>
    </div>
</body>

</html>