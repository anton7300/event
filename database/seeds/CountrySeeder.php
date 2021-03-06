<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::query()->delete();

        $now = date("Y-m-d H:i:s");

        Country::insert([
            ["title" => "Andorra (Principality of)", "iso" => "AD", "created_at" => $now, "updated_at" => $now],
            ["title" => "United Arab Emirates", "iso" => "AE", "created_at" => $now, "updated_at" => $now],
            ["title" => "Afghanistan", "iso" => "AF", "created_at" => $now, "updated_at" => $now],
            ["title" => "Antigua and Barbuda", "iso" => "AG", "created_at" => $now, "updated_at" => $now],
            ["title" => "Anguilla", "iso" => "AI", "created_at" => $now, "updated_at" => $now],
            ["title" => "Albania (Republic of)", "iso" => "AL", "created_at" => $now, "updated_at" => $now],
            ["title" => "Armenia (Republic of)", "iso" => "AM", "created_at" => $now, "updated_at" => $now],
            ["title" => "Angola (Republic of)", "iso" => "AO", "created_at" => $now, "updated_at" => $now],
            ["title" => "Antarctica", "iso" => "AQ", "created_at" => $now, "updated_at" => $now],
            ["title" => "Argentine Republic", "iso" => "AR", "created_at" => $now, "updated_at" => $now],
            ["title" => "American Samoa", "iso" => "AS", "created_at" => $now, "updated_at" => $now],
            ["title" => "Austria", "iso" => "AT", "created_at" => $now, "updated_at" => $now],
            ["title" => "Australia", "iso" => "AU", "created_at" => $now, "updated_at" => $now],
            ["title" => "Aruba", "iso" => "AW", "created_at" => $now, "updated_at" => $now],
            ["title" => "Azerbaijan (Republic of)", "iso" => "AZ", "created_at" => $now, "updated_at" => $now],
            ["title" => "Bosnia and Herzegovina", "iso" => "BA", "created_at" => $now, "updated_at" => $now],
            ["title" => "Barbados", "iso" => "BB", "created_at" => $now, "updated_at" => $now],
            ["title" => "Bangladesh (People's Republic of)", "iso" => "BD", "created_at" => $now, "updated_at" => $now],
            ["title" => "Belgium", "iso" => "BE", "created_at" => $now, "updated_at" => $now],
            ["title" => "Burkina Faso", "iso" => "BF", "created_at" => $now, "updated_at" => $now],
            ["title" => "Bulgaria (Republic of)", "iso" => "BG", "created_at" => $now, "updated_at" => $now],
            ["title" => "Bahrain (Kingdom of)", "iso" => "BH", "created_at" => $now, "updated_at" => $now],
            ["title" => "Burundi (Republic of)", "iso" => "BI", "created_at" => $now, "updated_at" => $now],
            ["title" => "Benin (Republic of)", "iso" => "BJ", "created_at" => $now, "updated_at" => $now],
            ["title" => "Bermuda", "iso" => "BM", "created_at" => $now, "updated_at" => $now],
            ["title" => "Brunei Darussalam", "iso" => "BN", "created_at" => $now, "updated_at" => $now],
            ["title" => "Bolivia (Plurinational State of)", "iso" => "BO", "created_at" => $now, "updated_at" => $now],
            ["title" => "Bonaire, Sint Eustatius and Saba", "iso" => "BQ", "created_at" => $now, "updated_at" => $now],
            ["title" => "Brazil (Federative Republic of)", "iso" => "BR", "created_at" => $now, "updated_at" => $now],
            ["title" => "Bahamas (Commonwealth of the)", "iso" => "BS", "created_at" => $now, "updated_at" => $now],
            ["title" => "Bhutan (Kingdom of)", "iso" => "BT", "created_at" => $now, "updated_at" => $now],
            ["title" => "Botswana (Republic of)", "iso" => "BW", "created_at" => $now, "updated_at" => $now],
            ["title" => "Belarus (Republic of)", "iso" => "BY", "created_at" => $now, "updated_at" => $now],
            ["title" => "Belize", "iso" => "BZ", "created_at" => $now, "updated_at" => $now],
            ["title" => "Canada", "iso" => "CA", "created_at" => $now, "updated_at" => $now],
            ["title" => "Cocos (Keeling) Islands", "iso" => "CC", "created_at" => $now, "updated_at" => $now],
            ["title" => "Congo (The Democratic Republic of the)", "iso" => "CD", "created_at" => $now, "updated_at" => $now],
            ["title" => "Central African Republic", "iso" => "CF", "created_at" => $now, "updated_at" => $now],
            ["title" => "Congo (Republic of the)", "iso" => "CG", "created_at" => $now, "updated_at" => $now],
            ["title" => "Switzerland (Confederation of)", "iso" => "CH", "created_at" => $now, "updated_at" => $now],
            ["title" => "Cote d'Ivoire (Republic of)", "iso" => "CI", "created_at" => $now, "updated_at" => $now],
            ["title" => "Cook Islands", "iso" => "CK", "created_at" => $now, "updated_at" => $now],
            ["title" => "Chile", "iso" => "CL", "created_at" => $now, "updated_at" => $now],
            ["title" => "Cameroon (Republic of)", "iso" => "CM", "created_at" => $now, "updated_at" => $now],
            ["title" => "China (People's Republic of)", "iso" => "CN", "created_at" => $now, "updated_at" => $now],
            ["title" => "Colombia (Republic of)", "iso" => "CO", "created_at" => $now, "updated_at" => $now],
            ["title" => "Costa Rica", "iso" => "CR", "created_at" => $now, "updated_at" => $now],
            ["title" => "Cuba", "iso" => "CU", "created_at" => $now, "updated_at" => $now],
            ["title" => "Cabo Verde (Republic of)", "iso" => "CV", "created_at" => $now, "updated_at" => $now],
            ["title" => "Curacao", "iso" => "CW", "created_at" => $now, "updated_at" => $now],
            ["title" => "Christmas Island", "iso" => "CX", "created_at" => $now, "updated_at" => $now],
            ["title" => "Cyprus (Republic of)", "iso" => "CY", "created_at" => $now, "updated_at" => $now],
            ["title" => "Czech Republic (Czechia)", "iso" => "CZ", "created_at" => $now, "updated_at" => $now],
            ["title" => "Germany (Federal Republic of)", "iso" => "DE", "created_at" => $now, "updated_at" => $now],
            ["title" => "Diego Garcia", "iso" => "DG", "created_at" => $now, "updated_at" => $now],
            ["title" => "Djibouti (Republic of)", "iso" => "DJ", "created_at" => $now, "updated_at" => $now],
            ["title" => "Denmark", "iso" => "DK", "created_at" => $now, "updated_at" => $now],
            ["title" => "Dominica (Commonwealth of)", "iso" => "DM", "created_at" => $now, "updated_at" => $now],
            ["title" => "Dominican Republic", "iso" => "DO", "created_at" => $now, "updated_at" => $now],
            ["title" => "Algeria (People's Democratic Republic of)", "iso" => "DZ", "created_at" => $now, "updated_at" => $now],
            ["title" => "Ecuador", "iso" => "EC", "created_at" => $now, "updated_at" => $now],
            ["title" => "Estonia (Republic of)", "iso" => "EE", "created_at" => $now, "updated_at" => $now],
            ["title" => "Egypt (Arab Republic of)", "iso" => "EG", "created_at" => $now, "updated_at" => $now],
            ["title" => "Eritrea (State of)", "iso" => "ER", "created_at" => $now, "updated_at" => $now],
            ["title" => "Spain", "iso" => "ES", "created_at" => $now, "updated_at" => $now],
            ["title" => "Ethiopia (Federal Democratic Republic of)", "iso" => "ET", "created_at" => $now, "updated_at" => $now],
            ["title" => "Finland", "iso" => "FI", "created_at" => $now, "updated_at" => $now],
            ["title" => "Fiji (Republic of)", "iso" => "FJ", "created_at" => $now, "updated_at" => $now],
            ["title" => "Falkland Islands (Malvinas)", "iso" => "FK", "created_at" => $now, "updated_at" => $now],
            ["title" => "Micronesia (Federated States of)", "iso" => "FM", "created_at" => $now, "updated_at" => $now],
            ["title" => "Faroe Islands", "iso" => "FO", "created_at" => $now, "updated_at" => $now],
            ["title" => "France", "iso" => "FR", "created_at" => $now, "updated_at" => $now],
            ["title" => "Gabon, Gabonese Republic", "iso" => "GA", "created_at" => $now, "updated_at" => $now],
            ["title" => "United Kingdom of Great Britain and Northern Ireland", "iso" => "GB", "created_at" => $now, "updated_at" => $now],
            ["title" => "Grenada", "iso" => "GD", "created_at" => $now, "updated_at" => $now],
            ["title" => "Georgia", "iso" => "GE", "created_at" => $now, "updated_at" => $now],
            ["title" => "French Guiana (French Department of)", "iso" => "GF", "created_at" => $now, "updated_at" => $now],
            ["title" => "Ghana", "iso" => "GH", "created_at" => $now, "updated_at" => $now],
            ["title" => "Gibraltar", "iso" => "GI", "created_at" => $now, "updated_at" => $now],
            ["title" => "Greenland (Denmark)", "iso" => "GL", "created_at" => $now, "updated_at" => $now],
            ["title" => "Gambia (Republic of the)", "iso" => "GM", "created_at" => $now, "updated_at" => $now],
            ["title" => "Guinea (Republic of)", "iso" => "GN", "created_at" => $now, "updated_at" => $now],
            ["title" => "Guadeloupe (French Department of)", "iso" => "GP", "created_at" => $now, "updated_at" => $now],
            ["title" => "Equatorial Guinea (Republic of)", "iso" => "GQ", "created_at" => $now, "updated_at" => $now],
            ["title" => "Greece", "iso" => "GR", "created_at" => $now, "updated_at" => $now],
            ["title" => "Guatemala (Republic of)", "iso" => "GT", "created_at" => $now, "updated_at" => $now],
            ["title" => "Guam", "iso" => "GU", "created_at" => $now, "updated_at" => $now],
            ["title" => "Guinea-Bissau (Republic of)", "iso" => "GW", "created_at" => $now, "updated_at" => $now],
            ["title" => "Guyana", "iso" => "GY", "created_at" => $now, "updated_at" => $now],
            ["title" => "Hong Kong, China", "iso" => "HK", "created_at" => $now, "updated_at" => $now],
            ["title" => "Honduras (Republic of)", "iso" => "HN", "created_at" => $now, "updated_at" => $now],
            ["title" => "Croatia (Republic of)", "iso" => "HR", "created_at" => $now, "updated_at" => $now],
            ["title" => "Haiti (Republic of)", "iso" => "HT", "created_at" => $now, "updated_at" => $now],
            ["title" => "Hungary", "iso" => "HU", "created_at" => $now, "updated_at" => $now],
            ["title" => "Indonesia (Republic of)", "iso" => "ID", "created_at" => $now, "updated_at" => $now],
            ["title" => "Ireland", "iso" => "IE", "created_at" => $now, "updated_at" => $now],
            ["title" => "Israel (State of)", "iso" => "IL", "created_at" => $now, "updated_at" => $now],
            ["title" => "India (Republic of)", "iso" => "IN", "created_at" => $now, "updated_at" => $now],
            ["title" => "Iraq (Republic of)", "iso" => "IQ", "created_at" => $now, "updated_at" => $now],
            ["title" => "Iran (Islamic Republic of)", "iso" => "IR", "created_at" => $now, "updated_at" => $now],
            ["title" => "Iceland", "iso" => "IS", "created_at" => $now, "updated_at" => $now],
            ["title" => "Italy", "iso" => "IT", "created_at" => $now, "updated_at" => $now],
            ["title" => "Jamaica", "iso" => "JM", "created_at" => $now, "updated_at" => $now],
            ["title" => "Jordan (Hashemite Kingdom of)", "iso" => "JO", "created_at" => $now, "updated_at" => $now],
            ["title" => "Japan", "iso" => "JP", "created_at" => $now, "updated_at" => $now],
            ["title" => "Kenya (Republic of)", "iso" => "KE", "created_at" => $now, "updated_at" => $now],
            ["title" => "Kyrgyzstan, Kyrgyz Republic", "iso" => "KG", "created_at" => $now, "updated_at" => $now],
            ["title" => "Cambodia (Kingdom of)", "iso" => "KH", "created_at" => $now, "updated_at" => $now],
            ["title" => "Kiribati (Republic of)", "iso" => "KI", "created_at" => $now, "updated_at" => $now],
            ["title" => "Comoros (Union of the)", "iso" => "KM", "created_at" => $now, "updated_at" => $now],
            ["title" => "Saint Kitts and Nevis", "iso" => "KN", "created_at" => $now, "updated_at" => $now],
            ["title" => "Korea (Democratic People's Republic of)", "iso" => "KP", "created_at" => $now, "updated_at" => $now],
            ["title" => "Korea (Republic of)", "iso" => "KR", "created_at" => $now, "updated_at" => $now],
            ["title" => "Kuwait (State of)", "iso" => "KW", "created_at" => $now, "updated_at" => $now],
            ["title" => "Cayman Islands", "iso" => "KY", "created_at" => $now, "updated_at" => $now],
            ["title" => "Kazakhstan (Republic of)", "iso" => "KZ", "created_at" => $now, "updated_at" => $now],
            ["title" => "Lao People's Democratic Republic", "iso" => "LA", "created_at" => $now, "updated_at" => $now],
            ["title" => "Lebanon", "iso" => "LB", "created_at" => $now, "updated_at" => $now],
            ["title" => "Saint Lucia", "iso" => "LC", "created_at" => $now, "updated_at" => $now],
            ["title" => "Liechtenstein (Principality of)", "iso" => "LI", "created_at" => $now, "updated_at" => $now],
            ["title" => "Sri Lanka (Democratic Socialist Republic of)", "iso" => "LK", "created_at" => $now, "updated_at" => $now],
            ["title" => "Liberia (Republic of)", "iso" => "LR", "created_at" => $now, "updated_at" => $now],
            ["title" => "Lesotho (Kingdom of)", "iso" => "LS", "created_at" => $now, "updated_at" => $now],
            ["title" => "Lithuania (Republic of)", "iso" => "LT", "created_at" => $now, "updated_at" => $now],
            ["title" => "Luxembourg", "iso" => "LU", "created_at" => $now, "updated_at" => $now],
            ["title" => "Latvia (Republic of)", "iso" => "LV", "created_at" => $now, "updated_at" => $now],
            ["title" => "Libyan Arab Jamahiriya", "iso" => "LY", "created_at" => $now, "updated_at" => $now],
            ["title" => "Morocco (Kingdom of)", "iso" => "MA", "created_at" => $now, "updated_at" => $now],
            ["title" => "Monaco (Principality of)", "iso" => "MC", "created_at" => $now, "updated_at" => $now],
            ["title" => "Moldova (Republic of)", "iso" => "MD", "created_at" => $now, "updated_at" => $now],
            ["title" => "Montenegro (Republic of)", "iso" => "ME", "created_at" => $now, "updated_at" => $now],
            ["title" => "Madagascar (Republic of)", "iso" => "MG", "created_at" => $now, "updated_at" => $now],
            ["title" => "Marshall Islands (Republic of the)", "iso" => "MH", "created_at" => $now, "updated_at" => $now],
            ["title" => "Macedonia (The Former Yugoslav Republic of)", "iso" => "MK", "created_at" => $now, "updated_at" => $now],
            ["title" => "Mali (Republic of)", "iso" => "ML", "created_at" => $now, "updated_at" => $now],
            ["title" => "Myanmar (Republic of the Union of)", "iso" => "MM", "created_at" => $now, "updated_at" => $now],
            ["title" => "Mongolia", "iso" => "MN", "created_at" => $now, "updated_at" => $now],
            ["title" => "Macao, China", "iso" => "MO", "created_at" => $now, "updated_at" => $now],
            ["title" => "Northern Mariana Islands (Commonwealth of the)", "iso" => "MP", "created_at" => $now, "updated_at" => $now],
            ["title" => "Martinique (French Department of)", "iso" => "MQ", "created_at" => $now, "updated_at" => $now],
            ["title" => "Mauritania (Islamic Republic of)", "iso" => "MR", "created_at" => $now, "updated_at" => $now],
            ["title" => "Montserrat", "iso" => "MS", "created_at" => $now, "updated_at" => $now],
            ["title" => "Malta", "iso" => "MT", "created_at" => $now, "updated_at" => $now],
            ["title" => "Mauritius (Republic of)", "iso" => "MU", "created_at" => $now, "updated_at" => $now],
            ["title" => "Maldives (Republic of)", "iso" => "MV", "created_at" => $now, "updated_at" => $now],
            ["title" => "Malawi", "iso" => "MW", "created_at" => $now, "updated_at" => $now],
            ["title" => "Mexico", "iso" => "MX", "created_at" => $now, "updated_at" => $now],
            ["title" => "Malaysia", "iso" => "MY", "created_at" => $now, "updated_at" => $now],
            ["title" => "Mozambique (Republic of)", "iso" => "MZ", "created_at" => $now, "updated_at" => $now],
            ["title" => "Namibia (Republic of)", "iso" => "NA", "created_at" => $now, "updated_at" => $now],
            ["title" => "New Caledonia (Territoire francais d'outre-mer)", "iso" => "NC", "created_at" => $now, "updated_at" => $now],
            ["title" => "Niger (Republic of the)", "iso" => "NE", "created_at" => $now, "updated_at" => $now],
            ["title" => "Norfolk Island", "iso" => "NF", "created_at" => $now, "updated_at" => $now],
            ["title" => "Nigeria (Federal Republic of)", "iso" => "NG", "created_at" => $now, "updated_at" => $now],
            ["title" => "Nicaragua", "iso" => "NI", "created_at" => $now, "updated_at" => $now],
            ["title" => "Netherlands (Kingdom of the)", "iso" => "NL", "created_at" => $now, "updated_at" => $now],
            ["title" => "Norway", "iso" => "NO", "created_at" => $now, "updated_at" => $now],
            ["title" => "Nepal (Federal Democratic Republic of)", "iso" => "NP", "created_at" => $now, "updated_at" => $now],
            ["title" => "Nauru (Republic of)", "iso" => "NR", "created_at" => $now, "updated_at" => $now],
            ["title" => "Niue", "iso" => "NU", "created_at" => $now, "updated_at" => $now],
            ["title" => "New Zealand", "iso" => "NZ", "created_at" => $now, "updated_at" => $now],
            ["title" => "Oman (Sultanate of)", "iso" => "OM", "created_at" => $now, "updated_at" => $now],
            ["title" => "Panama (Republic of)", "iso" => "PA", "created_at" => $now, "updated_at" => $now],
            ["title" => "Peru", "iso" => "PE", "created_at" => $now, "updated_at" => $now],
            ["title" => "French Polynesia (Territoire francais d'outre-mer)", "iso" => "PF", "created_at" => $now, "updated_at" => $now],
            ["title" => "Papua New Guinea (Independent State of)", "iso" => "PG", "created_at" => $now, "updated_at" => $now],
            ["title" => "Philippines (Republic of the)", "iso" => "PH", "created_at" => $now, "updated_at" => $now],
            ["title" => "Pakistan (Islamic Republic of)", "iso" => "PK", "created_at" => $now, "updated_at" => $now],
            ["title" => "Poland (Republic of)", "iso" => "PL", "created_at" => $now, "updated_at" => $now],
            ["title" => "Saint Pierre and Miquelon (Collectivite' territoriale de la Republique francaise)", "iso" => "PM", "created_at" => $now, "updated_at" => $now],
            ["title" => "Puerto Rico", "iso" => "PR", "created_at" => $now, "updated_at" => $now],
            ["title" => "Palestinian Territory, Occupied", "iso" => "PS", "created_at" => $now, "updated_at" => $now],
            ["title" => "Portugal", "iso" => "PT", "created_at" => $now, "updated_at" => $now],
            ["title" => "Palau (Republic of)", "iso" => "PW", "created_at" => $now, "updated_at" => $now],
            ["title" => "Paraguay (Republic of)", "iso" => "PY", "created_at" => $now, "updated_at" => $now],
            ["title" => "Qatar (State of)", "iso" => "QA", "created_at" => $now, "updated_at" => $now],
            ["title" => "Reunion (French Department of)", "iso" => "RE", "created_at" => $now, "updated_at" => $now],
            ["title" => "Romania", "iso" => "RO", "created_at" => $now, "updated_at" => $now],
            ["title" => "Serbia (Republic of)", "iso" => "RS", "created_at" => $now, "updated_at" => $now],
            ["title" => "Russian Federation", "iso" => "RU", "created_at" => $now, "updated_at" => $now],
            ["title" => "Rwanda (Republic of)", "iso" => "RW", "created_at" => $now, "updated_at" => $now],
            ["title" => "Saudi Arabia (Kingdom of)", "iso" => "SA", "created_at" => $now, "updated_at" => $now],
            ["title" => "Solomon Islands", "iso" => "SB", "created_at" => $now, "updated_at" => $now],
            ["title" => "Seychelles (Republic of)", "iso" => "SC", "created_at" => $now, "updated_at" => $now],
            ["title" => "Sudan (Republic of the)", "iso" => "SD", "created_at" => $now, "updated_at" => $now],
            ["title" => "Sweden", "iso" => "SE", "created_at" => $now, "updated_at" => $now],
            ["title" => "Singapore (Republic of)", "iso" => "SG", "created_at" => $now, "updated_at" => $now],
            ["title" => "Saint Helena, Ascension and Tristan da Cunha", "iso" => "SH", "created_at" => $now, "updated_at" => $now],
            ["title" => "Slovenia (Republic of)", "iso" => "SI", "created_at" => $now, "updated_at" => $now],
            ["title" => "Slovakia, Slovak Republic", "iso" => "SK", "created_at" => $now, "updated_at" => $now],
            ["title" => "Sierra Leone", "iso" => "SL", "created_at" => $now, "updated_at" => $now],
            ["title" => "San Marino (Republic of)", "iso" => "SM", "created_at" => $now, "updated_at" => $now],
            ["title" => "Senegal (Republic of)", "iso" => "SN", "created_at" => $now, "updated_at" => $now],
            ["title" => "Somalia (Federal Republic of)", "iso" => "SO", "created_at" => $now, "updated_at" => $now],
            ["title" => "Suriname (Republic of)", "iso" => "SR", "created_at" => $now, "updated_at" => $now],
            ["title" => "South Sudan (Republic of)", "iso" => "SS", "created_at" => $now, "updated_at" => $now],
            ["title" => "Sao Tome' and Principe (Democratic Republic of)", "iso" => "ST", "created_at" => $now, "updated_at" => $now],
            ["title" => "El Salvador (Republic of)", "iso" => "SV", "created_at" => $now, "updated_at" => $now],
            ["title" => "Sint Maarten (Dutch part)", "iso" => "SX", "created_at" => $now, "updated_at" => $now],
            ["title" => "Syrian Arab Republic", "iso" => "SY", "created_at" => $now, "updated_at" => $now],
            ["title" => "Swaziland (Kingdom of)", "iso" => "SZ", "created_at" => $now, "updated_at" => $now],
            ["title" => "Turks and Caicos Islands", "iso" => "TC", "created_at" => $now, "updated_at" => $now],
            ["title" => "Chad (Republic of)", "iso" => "TD", "created_at" => $now, "updated_at" => $now],
            ["title" => "Togolese Republic", "iso" => "TG", "created_at" => $now, "updated_at" => $now],
            ["title" => "Thailand", "iso" => "TH", "created_at" => $now, "updated_at" => $now],
            ["title" => "Tajikistan (Republic of)", "iso" => "TJ", "created_at" => $now, "updated_at" => $now],
            ["title" => "Tokelau", "iso" => "TK", "created_at" => $now, "updated_at" => $now],
            ["title" => "Timor-Leste (Democratic Republic of)", "iso" => "TL", "created_at" => $now, "updated_at" => $now],
            ["title" => "Turkmenistan", "iso" => "TM", "created_at" => $now, "updated_at" => $now],
            ["title" => "Tunisia", "iso" => "TN", "created_at" => $now, "updated_at" => $now],
            ["title" => "Tonga (Kingdom of)", "iso" => "TO", "created_at" => $now, "updated_at" => $now],
            ["title" => "Turkey", "iso" => "TR", "created_at" => $now, "updated_at" => $now],
            ["title" => "Trinidad and Tobago", "iso" => "TT", "created_at" => $now, "updated_at" => $now],
            ["title" => "Tuvalu", "iso" => "TV", "created_at" => $now, "updated_at" => $now],
            ["title" => "Taiwan, Province of China", "iso" => "TW", "created_at" => $now, "updated_at" => $now],
            ["title" => "Tanzania (United Republic of)", "iso" => "TZ", "created_at" => $now, "updated_at" => $now],
            ["title" => "Ukraine", "iso" => "UA", "created_at" => $now, "updated_at" => $now],
            ["title" => "Uganda (Republic of)", "iso" => "UG", "created_at" => $now, "updated_at" => $now],
            ["title" => "United States of America", "iso" => "US", "created_at" => $now, "updated_at" => $now],
            ["title" => "Uruguay (Eastern Republic of)", "iso" => "UY", "created_at" => $now, "updated_at" => $now],
            ["title" => "Uzbekistan (Republic of)", "iso" => "UZ", "created_at" => $now, "updated_at" => $now],
            ["title" => "Holy See (Vatican City State)", "iso" => "VA", "created_at" => $now, "updated_at" => $now],
            ["title" => "Saint Vincent and the Grenadines", "iso" => "VC", "created_at" => $now, "updated_at" => $now],
            ["title" => "Venezuela (Bolivarian Republic of)", "iso" => "VE", "created_at" => $now, "updated_at" => $now],
            ["title" => "Virgin Islands, British", "iso" => "VG", "created_at" => $now, "updated_at" => $now],
            ["title" => "Virgin Islands, United States", "iso" => "VI", "created_at" => $now, "updated_at" => $now],
            ["title" => "Viet Nam (Socialist Republic of)", "iso" => "VN", "created_at" => $now, "updated_at" => $now],
            ["title" => "Vanuatu (Republic of)", "iso" => "VU", "created_at" => $now, "updated_at" => $now],
            ["title" => "Wallis and Futuna (Territoire francais d'outre-mer)", "iso" => "WF", "created_at" => $now, "updated_at" => $now],
            ["title" => "Samoa (Independent State of)", "iso" => "WS", "created_at" => $now, "updated_at" => $now],
            ["title" => "Kosovo (Republic of)", "iso" => "XK", "created_at" => $now, "updated_at" => $now],
            ["title" => "Yemen (Republic of)", "iso" => "YE", "created_at" => $now, "updated_at" => $now],
            ["title" => "Mayotte", "iso" => "YT", "created_at" => $now, "updated_at" => $now],
            ["title" => "South Africa (Republic of)", "iso" => "ZA", "created_at" => $now, "updated_at" => $now],
            ["title" => "Zambia (Republic of)", "iso" => "ZM", "created_at" => $now, "updated_at" => $now],
            ["title" => "Zimbabwe (Republic of)", "iso" => "ZW", "created_at" => $now, "updated_at" => $now],
            ["title" => "Bouvet Island", "iso" => "BV", "created_at" => $now, "updated_at" => $now],
            ["title" => "British Indian Ocean Territory", "iso" => "IO", "created_at" => $now, "updated_at" => $now],
            ["title" => "French Southern Territories", "iso" => "TF", "created_at" => $now, "updated_at" => $now],
            ["title" => "Heard Island and Mcdonald Islands", "iso" => "HM", "created_at" => $now, "updated_at" => $now],
            ["title" => "Netherlands Antilles", "iso" => "AN", "created_at" => $now, "updated_at" => $now],
            ["title" => "Pitcairn", "iso" => "PN", "created_at" => $now, "updated_at" => $now],
            ["title" => "South Georgia and the South Sandwich Islands", "iso" => "GS", "created_at" => $now, "updated_at" => $now],
            ["title" => "Svalbard and Jan Mayen", "iso" => "SJ", "created_at" => $now, "updated_at" => $now],
            ["title" => "United States Minor Outlying Islands", "iso" => "UM", "created_at" => $now, "updated_at" => $now],
            ["title" => "Western Sahara", "iso" => "EH", "created_at" => $now, "updated_at" => $now],
            ["title" => "Asia / Pacific Region", "iso" => "AP", "created_at" => $now, "updated_at" => $now],
            ["title" => "Aland Islands", "iso" => "AX", "created_at" => $now, "updated_at" => $now],
            ["title" => "Guernsey", "iso" => "GG", "created_at" => $now, "updated_at" => $now],
            ["title" => "Isle of Man", "iso" => "IM", "created_at" => $now, "updated_at" => $now],
            ["title" => "Jersey", "iso" => "JE", "created_at" => $now, "updated_at" => $now],
            ["title" => "Saint Barthelemy", "iso" => "BL", "created_at" => $now, "updated_at" => $now],
            ["title" => "Saint Martin", "iso" => "MF", "created_at" => $now, "updated_at" => $now]
        ]);
    }
}
