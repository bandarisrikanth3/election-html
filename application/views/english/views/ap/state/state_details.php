 <tr>
                  <th>రాష్ట్రం:</th>
                  <td><?php echo $state->telname;?></td>
                </tr>
               <tr>
                  <th>జిల్లాలు:</th>
                  <td>31</td>
                </tr>
                <tr>
                  <th>అసెంబ్లీ నియోజకవర్గాలు:</th>
                  <td><?php echo number_format($state->noofassemcont);?></td>
                </tr>
                <tr>
                  <th>లోక్ సభ నియోజకవర్గాలు:</th>
                  <td>17</td>
                </tr>
                 <tr>
                    <th>రాష్ట్రీయ గుర్తింపు పొందిన పార్టీలు:</th>
                    <td>4 (ఈసీ ప్రకటన మేరకు)</td>
                </tr>
				          <tr>
                  <th>ఈసీ వద్ద రిజిస్టరైన పార్టీలు:</th>
                  <td>66 ( 15.11.2018 తెలంగాణలో)</td>
                </tr>
                 <tr>
                  <th>మొత్తం ఓటర్ల సంఖ్య:</th>
                  <td><?php echo number_format($state->noofvoters);?></td>
                </tr>
                 <tr>
                  <th>పురుషులు:</th>
                  <td><?php echo number_format($state->malevoters);?></td>
                </tr>
                 <tr>
                  <th>మహిళలు:</th>
                  <td><?php echo number_format($state->femalevoters);?></td>
                </tr>