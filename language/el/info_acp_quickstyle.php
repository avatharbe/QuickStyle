<?php
/**
 *
 * @package Quick Style
 * Greek translation by MakisH
 *
 * @copyright (c) 2015 PayBas
 * @copyright (c) 2026 Avathar
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * Based on the original Prime Quick Style by Ken F. Innes IV (primehalo)
 *
 */

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'AV_QUICK_STYLE'						=> 'Γρήγορο στυλ',
	'AV_QUICK_STYLE_EXPLAIN'				=> 'Προσθέτει ένα αναδυόμενο μενού στην κεφαλίδα κάθε σελίδας για γρήγορη αλλαγή στυλ. Βασισμένο στο πρώην Prime Quick Style του primehalo.',
	'AV_QUICK_STYLE_SETTINGS'				=> 'Ρυθμίσεις Γρήγορου Στυλ',
	'AV_QUICK_STYLE_DEFAULT_LOC'			=> 'Χρήση της προεπιλεγμένης θέσης',
	'AV_QUICK_STYLE_DEFAULT_LOC_EXPLAIN'	=> 'Από προεπιλογή, η επέκταση Quick Style εισάγει έναν επιλογέα στα δεξιά της διαδρομής περιήγησης στην κορυφή. Ορίζοντας αυτό σε “όχι“ σας επιτρέπει να εισάγετε το quickstyle_event κάπου αλλού στο στυλ σας.',
	'AV_QUICK_STYLE_PERMISSION_EXPLAIN'	=> 'Η πρόσβαση στον επιλογέα στυλ ελέγχεται μέσω του δικαιώματος <strong>Μπορεί να χρησιμοποιήσει το Quick Style</strong>. Ρυθμίστε το στη Διαχείριση &raquo; Δικαιώματα &raquo; Δικαιώματα χρηστών ή ομάδων.',
	'AV_QUICK_STYLE_OVERRIDE_ENABLED'		=> 'Η ρύθμιση “Παράκαμψη στυλ μέλους” είναι ενεργή σε αυτό το σύστημα συζητήσεων. Ο επιλογέας στυλ δεν θα λειτουργεί αν δεν απενεργοποιήσετε αυτή τη ρύθμιση.',

	'ACL_U_QUICKSTYLE'					=> 'Μπορεί να χρησιμοποιήσει το Quick Style',
));
