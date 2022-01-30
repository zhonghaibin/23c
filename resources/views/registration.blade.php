@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <div>
                            <div>
                                <h4 class="mt-0 header-title">
                                    <i class="mdi mdi-account"></i>
                                    <span> Registration </span></h4>
                                <div class="dropdown">
                                    <form role="form" class="form-horizontal">
                                        <div class="input-container">
                                            <label class="col-form-label">Introducer Id :@{{ introducer_id }}</label>
                                            <strong style="color: red" id="introducer_msg"></strong>
                                        </div>
                                        <div class="input-container">
                                            <label class="col-form-label">Introducer Name: @{{ introducer_name }}</label>

                                        </div>
                                        <div class="input-container">
                                            <label class="col-form-label">User Id</label>
                                            <input type="text" class="form-control" v-model="user_id" onKeyUp="value=value.replace(/[\W]/g,'')">
                                            <strong style="color: red" id="user_msg"></strong>
                                        </div>
                                        <div class="input-container">
                                            <label class="col-form-label">Name</label>
                                            <input type="text" class="form-control"  v-model="name" onkeyup="value=value.replace(/[^a-zA-Z]/g,'')">
                                            <strong style="color: red" id="name_msg"></strong>
                                        </div>
                                        <div class="input-container">
                                            <label class="col-form-label">NRIC</label>
                                            <input type="text" class="form-control"  v-model="nric">
                                            <strong style="color: red" id="nric_msg"></strong>
                                        </div>
                                        <div class="input-container">
                                            <label class="col-form-label">Tel</label>
                                            <input type="text" class="form-control"  v-model="tel" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
                                            <strong style="color: red" id="tel_msg"></strong>
                                        </div>
                                        <div class="input-container">
                                            <label class="col-form-label">Password</label>
                                            <input type="password" class="form-control"  v-model="password" onKeyUp="value=value.replace(/[\W]/g,'')">
                                            <strong style="color: red" id="password_msg"></strong>
                                        </div>
                                        <div class="input-container">
                                            <label class="col-form-label">Re-Confirm Password</label>
                                            <input type="password" class="form-control"  v-model="re_confirm_password" onKeyUp="value=value.replace(/[\W]/g,'')">
                                        </div>
                                        <div class="input-container">
                                            <label class="col-form-label">Address</label>
                                            <input type="text" class="form-control"  v-model="address">
                                        </div>
                                        <div class="input-container">
                                            <label class="col-form-label">Email</label>
                                            <input type="text" class="form-control"  v-model="email">
                                            <strong style="color: red" id="email_msg"></strong>
                                        </div>
                                        <div class="input-container">
                                            <label class="col-form-label">Select</label>
                                            <select class="custom-select" v-model="select">
                                                <option value="1">Authorized Agent</option>
                                                <option value="2">Referrer</option>
                                                <option value="3">Enquiry</option>
                                            </select>
                                        </div>
                                        <div style="margin-top: 6px">
                                            <label class="checkbox-inline" style="color: #c9c9c9">
                                                <input type="checkbox" name="nda"  v-model="nda"> I have read and agree to 23C's
                                                Noo-Disclosure Agreement <a href="javascript:;" @click="nad()"> (NDA)</a>
                                            </label>
                                            <br/>
                                            <strong style="color: red" id="nda_msg"></strong>
                                        </div>
                                        <div class="float-center" style="text-align: center;">
                                            <button type="button"
                                                    class="btn  width-xs btn-info waves-light  btn-small" @click="saveRegistration">Confirm
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="demo-modal" class="demo-modal" style="overflow: auto">
            <a href="javascript:void(0);" onclick="Custombox.modal.close();" class="demo-close"><i
                    class="mdi mdi-close"></i></a>
            <div>
                <p style="margin-top:0pt; margin-bottom:0pt; text-indent:12pt; text-align:center; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial; font-weight:bold;">NON-DISCLOSURE AGREEMENT</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:10.5pt"><span style="font-family:'等线'">&nbsp;</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="width:21pt; display:inline-block">&nbsp;</span><span style="font-family:Arial">THIS AGREEMENT (the “Agreement”) is entered into on this ____day of _____202</span><span style="font-family:Arial">2</span><span style="font-family:Arial"> by and between EZCELL Solutions collaborates with 23 Century International Life Science Center </span><span style="font-family:Arial">Sdn</span><span style="font-family:Arial">. Bhd., located at Block D &amp; E, </span><span style="font-family:Arial">No</span><span style="font-family:Arial">:3, Jalan </span><span style="font-family:Arial">Tasik</span><span style="font-family:Arial">, Mines Wellness City, 43300 Seri Kembangan, Selangor (the “Disclosing Party”), and __________________, I/C________________ (the “Receiving Party”)</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="width:21pt; display:inline-block">&nbsp;</span><span style="font-family:Arial">The Re</span><span style="font-family:Arial">ceiving Party hereto desires to participate in discussions regarding </span><span style="font-family:Arial">EZC</span><span style="font-family:Arial">ELL</span><span style="font-family:Arial"> Solutions and </span><span style="font-family:Arial">23 Century Groups’ companies, products, trade secrets information (the “Project”). During these discussions, Disclosing Party may share certain proprietary information with the Receiving Party. Therefore, in</span><span style="font-family:Arial"> consideration of the mutual promises and covenants contained in this Agreement, and other good and valuable consideration, the receipt and sufficiency of which is hereby acknowledged, the parties hereto agree as follows:</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p>
                <ol type="1" style="margin:0pt; padding-left:0pt">
                    <li style="margin-left:15.01pt; text-align:justify; widows:0; orphans:0; padding-left:2.99pt; font-family:Arial; font-size:12pt"><span style="text-decoration:underline">D</span><span style="text-decoration:underline">efinition of Confidential Information</span></li>
                </ol>
                <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; text-indent:-18pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">(a)</span><span style="font:7pt 'Times New Roman'">&nbsp; </span><span style="font-family:Arial">For purpose of the Agreement, “Confidential Information” means and data or information that is proprietary to the Disclosing Party and not generally known to the public, whether in tangible or intangible form, in whatever medium provided, whether unmodified or modified by Receiving Party or its Representatives (as defined herein), whenever and however disclosed, including, but not limited to: (</span><span style="font-family:Arial">i</span><span style="font-family:Arial">)any marketing strategies, plans, financial information, or projections, operations, sales estimates, business plans and performance results relating to the past, present or future business activities of such parties, its affi</span><span style="font-family:Arial">liates, subsidiaries and affiliated companies; (ii) plans for products or services, and customer or supplier lists; (iii) any scientific or technical information, invention, design, process, procedure, formula, improvement, technology or method; (iv) any concepts, reports, data, know-how, works-in-progress, designs, development tools, specifications, computer software, source code, object code, flow-charts, databases, inventions, information and trade secrets; (v) any other information that should reasonably by recognized as confidential information of the Disclosing Party; and (vi) any information generated by Receiving Party or by </span><span style="font-family:Arial">ots</span><span style="font-family:Arial"> Representatives that contains, reflects, or is derived from any of the foregoing. Confidential Information need not be novel, unique, patentable, copyrightable or constitute a trade secret in order to be designated </span><span style="font-family:Arial">Confidential Information. The Receiving Party acknowledges that the Confidential Information is proprietary to the Disclosing Party, has been developed and obtained through great efforts by the Disclosing Party and </span><span style="font-family:Arial">t</span><span style="font-family:Arial">hat Disclosing Party regards all of its Confidential Information and trade secrets.</span></p>
                <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; text-indent:-18pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">(b)</span><span style="font:7pt 'Times New Roman'">&nbsp; </span><span style="font-family:Arial">Notwithstanding anything in the foregoing to the contrary, Confidential Information shall not include information which; (a) was lawfully possessed, as evidenced by the Receiving Party’s records, by the Receiving Party prior to the receiving</span><span style="font-family:Arial"> </span><span style="font-family:Arial">the Confidential Information from the Disclosing Party; (b) becomes rightfully known by </span><span style="font-family:Arial">the Receiving Party from a third-party source not under and obligation to Disclosing</span><span style="font-family:Arial"> </span><span style="font-family:Arial">Party to maintain confidentially: (c) is generally known by the public through no fault of or failure to act by the Receiving Party inconsistent with its obligations under this </span><span style="font-family:Arial">Agreement; (d)</span><span style="font-family:Arial"> </span><span style="font-family:Arial">is required to be disclosed in a judicial or administrative proceeding, or is otherwise requested or required to be disclosed by law or regulation, although the requirements of paragraph 4 hereof shall apply prior to any disclosure being made; and (e) is or has been independently developed by employees, consultants or agents of the Receiving Party without violation of the terms of this Agreement, as evidenced by the Receiving Party’s records, and without reference or access to any Confidential Information.</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p>
                <ol start="2" type="1" style="margin:0pt; padding-left:0pt">
                    <li style="margin-left:15.01pt; text-align:justify; widows:0; orphans:0; padding-left:2.99pt; font-family:Arial; font-size:12pt"><span style="text-decoration:underline">Disclosure of Confidential Information </span></li>
                </ol>
                <p style="margin-top:0pt; margin-left:18pt; margin-bottom:0pt; text-indent:21pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">F</span><span style="font-family:Arial">rom time to time, the Disclosure Party may disclose Confidential Information to the Receiving Party. The Receiving Party will: (a) limit disclosure of any </span><span style="font-family:Arial">Confidential Information to its directors, officers, employees, agents or representatives (collectively “Representatives”) who have a need to know such Confidential Information in connection with the current or contemplated business relationship between the parties to which the Agreement relates, and only for that purpose; (b) advise its Representatives of the proprietary nature of the Confidential Information and of the obligations set forth </span><span style="font-family:Arial">i</span><span style="font-family:Arial">n this Agreement, require such Representatives to the bound by written confidentiality restrictions no less stringent than those contained herein, and assume full liability for acts or omissions by its Representatives that are inconsistent with obligations under </span><span style="font-family:Arial">this Agreement; (c) keep all Confidential Information strictly confidential </span><span style="font-family:Arial">bu</span><span style="font-family:Arial"> using a reasonable degree of care, but not less than the degree of care used by it in safeguarding its own confidential information; and (d) not disclose any Confidential Information received by it to any third parties (except as otherwise provided for herein).</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p>
                <ol start="3" type="1" style="margin:0pt; padding-left:0pt">
                    <li style="margin-left:15.01pt; text-align:justify; widows:0; orphans:0; padding-left:2.99pt; font-family:Arial; font-size:12pt"><span style="text-decoration:underline">Use of Confidential Information</span></li>
                </ol>
                <p style="margin-top:0pt; margin-left:18pt; margin-bottom:0pt; text-indent:21pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">The Receiving Party agrees to use the Confidential Information solely in connection with</span><span style="font-family:Arial"> the current or contemplated business relationship between the parties and not for any purpose other than as authorized by this Agreement without the prior written consent of an authorized representative of the Disclosing Party. No other right or license, whether expressed or implied expressed or implied, in the Confidential Information is granted to the Receiving Party hereunder. Title to Confidential Information will</span><span style="font-family:Arial"> remain solely in the Disclosing Party.</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p>
                <ol start="4" type="1" style="margin:0pt; padding-left:0pt">
                    <li style="margin-left:15.01pt; text-align:justify; widows:0; orphans:0; padding-left:2.99pt; font-family:Arial; font-size:12pt"><span style="text-decoration:underline">Compelled Disclosure of Confidential Information</span></li>
                </ol>
                <p style="margin-top:0pt; margin-left:18pt; margin-bottom:0pt; text-indent:21pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">Notwithstanding anything in the foregoing to the contrary, the Receiving Party may disclose Confidential Information pursuant to any governmental, judicial, or administrative order, subpoena, discovery request, regulatory request or similar method, provided that receiving Party promptly notifies, to the extent practicable, the Disclosing Party in writing such demand for disclosure so that the Disclosing Party, at its sole expense, may seek to make such disclosure subject to a protective order appropriate remedy to preserve the confidentiality of the Confidential Information; provided that the Receiving Party will disclose only that portion of the requested Confidential Information that, in the written opinion of its legal counsel, it is required to disclose. The Receiving Party agrees that it shall not oppose and shall cooperate with efforts by the extent </span><span style="font-family:Arial">practicable, the Disclosing Party with respect to any such request for a protective order or other relief. Notwithstanding the foregoing, if the Disclosing Party is unable to obtain </span><span style="font-family:Arial">or does not seek a protective order and the Receiving Party is legally requested or required to disclose such Confidential Information, disclosure of such Confidential Information may be made without liability.</span></p>
                <p style="margin-top:0pt; margin-left:21pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p>
                <ol start="5" type="1" style="margin:0pt; padding-left:0pt">
                    <li style="margin-left:15.01pt; text-align:justify; widows:0; orphans:0; padding-left:2.99pt; font-family:Arial; font-size:12pt"><span style="text-decoration:underline">Term</span></li>
                </ol>
                <p style="margin-top:0pt; margin-left:18pt; margin-bottom:0pt; text-indent:21pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">This Agreement shall remain in effect for a two-year term (subject to a one-year extension if the parties are still discussing and considering the Project at the end of the second year). Notwithstanding the foregoing, the Receiving Party’s duty to hold in the confidential Information that was disclosed during term shall remain in effect indefinitely.</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p>
                <ol start="6" type="1" style="margin:0pt; padding-left:0pt">
                    <li style="margin-left:15.01pt; text-align:justify; widows:0; orphans:0; padding-left:2.99pt; font-family:Arial; font-size:12pt"><span style="text-decoration:underline">Remedies</span></li>
                </ol>
                <p style="margin-top:0pt; margin-left:18pt; margin-bottom:0pt; text-indent:21pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">Both parties acknowledge that the Confidential Information to be disclosed hereunder is of a unique and valuable character, and that the unauthorized dissemination of the Confidential Information would destroy or diminish the value of such information. The damages to Disclosing Party that would</span><span style="font-family:Arial"> result from the unauthorized dissemination of the Confident Information would be impossible to calculate. Therefore, both parties hereby agree that the Disclosing Party shall be entitled to injunctive relief preventing the dissemination of any Confidential Information in violation of the terms hereof. Such injunctive relief shall be in addition to any other remedies available hereunder, whether at law or in equity. Disclosing Party shall be entitled to recover its costs and fees, including reasonable attorney’s fees, incurred in obtaining and such relief. Further, in the event of litigation relating to this Agreement, the prevailing party shall be entitled to recover its reasonable attorney’s fees and expenses. </span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p>
                <ol start="7" type="1" style="margin:0pt; padding-left:0pt">
                    <li style="margin-left:15.01pt; text-align:justify; widows:0; orphans:0; padding-left:2.99pt; font-family:Arial; font-size:12pt"><span style="text-decoration:underline">Return of Confidential Information</span></li>
                </ol>
                <p style="margin-top:0pt; margin-left:18pt; margin-bottom:0pt; text-indent:21pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">R</span><span style="font-family:Arial">eceiving Party shall immediately return and redeliver to Disclosing Party all tangible material embodying and Confidential Information provided hereunder and all notes, summaries, memoranda, drawing, manual, records, excerpts or derivative information deriving therefrom, and all other documents or materials (“Note”) (and all copies of any of the foregoing, inclu</span><span style="font-family:Arial">d</span><span style="font-family:Arial">ing “copies” that have been converted to computerized</span><span style="font-family:Arial"> media in the form of image, data, word processing, or other types of files either manually or by image capture) based on or including any Confidential Information, in whatever form of storage or retrieval, upon the earlier of (</span><span style="font-family:Arial">i</span><span style="font-family:Arial">) the completion </span><span style="font-family:Arial">ot</span><span style="font-family:Arial"> termination of the dealings between the parties contemplated hereunder; (ii) the termination of this Agreement; or (iii) at such time as the Disclosing Party may so request; provided however that the Receiving Party may retain such of its documents as is necessary to enable it to comply with its reasonable document retention policies. Alternatively, the Receiving Party, with the written consent of the Disclosing Party may (or in the case of Notes, at the Receiving Party’s option) immediately destroy any of the foregoing embodying Confidential Information (or the reasonably non-recoverable data erasure of computerized data) and, upon request, certify in writing such destruction by an authorized officer of the Receiving Party supervising the destruction)</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p>
                <ol start="8" type="1" style="margin:0pt; padding-left:0pt">
                    <li style="margin-left:15.01pt; text-align:justify; widows:0; orphans:0; padding-left:2.99pt; font-family:Arial; font-size:12pt"><span style="text-decoration:underline">Notice of Breach</span></li>
                </ol>
                <p style="margin-top:0pt; margin-left:18pt; margin-bottom:0pt; text-indent:21pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">Receiving Party shall notify the Disclosing Party immediately upon discovery of, or suspicion of, (1) any unauthorized use or disclosure of Confidential Information by </span><span style="font-family:Arial">Receiving Party or its Representatives; or (2) any actions by Receiving Party or its Representatives; or (2) any actions by Receiving Party or its Representatives inconsistent with their representative obligation under this Agreement, Receiving Party shall cooperate with any and all efforts of</span><span style="font-family:Arial"> the Disclosing Party to help the Disclosing Party regain possession of Confidential Information and prevent its further unauthorized use.</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p>
                <ol start="9" type="1" style="margin:0pt; padding-left:0pt">
                    <li style="margin-left:15.01pt; text-align:justify; widows:0; orphans:0; padding-left:2.99pt; font-family:Arial; font-size:12pt"><span style="text-decoration:underline">No Binding Agreement for Project</span></li>
                </ol>
                <p style="margin-top:0pt; margin-left:18pt; margin-bottom:0pt; text-indent:21pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">The parties agree that neither party will be under any legal obligation of any kind whatsoever with</span><span style="font-family:Arial"> respect to a Project by virtue of this Agreement, except for the matters specifically agreed to herein. The parties further acknowledge and agree that they each reserve the right, in their sole and absolute discretion, to reject any and all proposals and to terminate discussions and negotiations with respect to a Project at any time. This Agreement does not create a joint venture or partnership between the parties. If a Project goes forward, the non-disclosure provisions of any applicable Project documents entered into between the parties (or their respective affiliates) for the Project </span><span style="font-family:Arial">shall supersede this Agreement. In the event such provision in not provided for in said Project documents, this Agreement shall control.</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p>
                <ol start="10" type="1" style="margin:0pt; padding-left:0pt">
                    <li style="margin-left:18pt; text-align:justify; widows:0; orphans:0; font-family:Arial; font-size:12pt"><span style="text-decoration:underline">Warranty</span></li>
                </ol>
                <p style="margin-top:0pt; margin-left:18pt; margin-bottom:0pt; text-indent:21pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">NO WARANTIES ARE MADE BY EITHER PARTY UNDER THIS AGREEMENT WHATSOEVER. The parties acknowledge that although they shall each endeavor to include in the </span><span style="font-family:Arial">Confidential Information all information that they each believe relevant for the purpose of the evaluation of a Project, the parties understand that no representation or warranty as to the </span><span style="font-family:Arial">accuracy or completeness of the Confidential Information is being made by the Disclosing Party. Further, neither party is under any obligation under this </span><span style="font-family:Arial">Agreement</span><span style="font-family:Arial"> to disclose and confidential Information it chooses not to disclose.</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p>
                <ol start="11" type="1" style="margin:0pt; padding-left:0pt">
                    <li style="margin-left:18pt; text-align:justify; widows:0; orphans:0; font-family:Arial; font-size:12pt"><span style="text-decoration:underline">M</span><span style="text-decoration:underline">iscellaneous</span></li>
                </ol>
                <p style="margin-top:0pt; margin-left:39pt; margin-bottom:0pt; text-indent:-18pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">(a)</span><span style="font:7pt 'Times New Roman'">&nbsp; </span><span style="font-family:Arial">T</span><span style="font-family:Arial">his agreement constitutes the entire understanding between the parties and supersedes any and prior or contemporaneous understandings and agreements, whether oral or written, between the parties, with respect to the subject matter hereof. This Agreement can only be modified by a written amendment signed by the party against whom enforcement of such modification is sought.</span></p>
                <p style="margin-top:0pt; margin-left:39pt; margin-bottom:0pt; text-indent:-18pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">(b)</span><span style="font:7pt 'Times New Roman'">&nbsp; </span><span style="font-family:Arial">The</span><span style="font-family:Arial"> </span><span style="font-family:Arial">validity</span><span style="font-family:Arial">, construction and performance of this Agreement shall be governed and construed in accordance with the laws of Malaysia applicable to contracts made and to be wholly performed within such country/state, without giving effect of laws provisions thereof. The Federal and State co</span><span style="font-family:Arial">u</span><span style="font-family:Arial">rts located in Malaysia shall have sole and exclusive </span><span style="font-family:Arial">jurisdiction over any disputes arising under, or in any way connected with or related to, the terms of this Agreement and Receiving Party: (</span><span style="font-family:Arial">i</span><span style="font-family:Arial">) consents to personal jurisdiction therein; and (ii) waives the right to raise forum non convenient or any similar objection.</span></p>
                <p style="margin-top:0pt; margin-left:39pt; margin-bottom:0pt; text-indent:-18pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">(c)</span><span style="font:7pt 'Times New Roman'">&nbsp;&nbsp; </span><span style="font-family:Arial">A</span><span style="font-family:Arial">lthough the restrictions contained in this Agreement are considered by the parties to be reasonable for purpose of protecting the Confidential Information, if any such restriction is found by a court of competent jurisdiction to be unenforceable, such provision will be modified, rewritten or interpreted to include as much of its nature </span><span style="font-family:Arial">and scope as will render it enforceable. If it cannot be so modified, rewritten or interpreted to be enforceable in any respect, it will not be given effect, and the remainder of the Agreement will be enforced as if such provision was not included.</span></p>
                <p style="margin-top:0pt; margin-left:39pt; margin-bottom:0pt; text-indent:-18pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">(d)</span><span style="font:7pt 'Times New Roman'">&nbsp; </span><span style="font-family:Arial">A</span><span style="font-family:Arial">ny notice or communication</span><span style="font-family:Arial">s</span><span style="font-family:Arial"> required or permitted to be given hereunder may be delivered by hand, deposit with a nationally recognized overnight carrier, electronic-mail, or mailed be certified mail, return receipt requested, postage prepaid, in each case, to the address of the other party first indicated above (or such other addressee as maybe furnished by a party in accordance with this paragraph). All such notices or communications shall be deemed to have been given and received</span><span style="font-family:Arial"> (</span><span style="font-family:Arial">i</span><span style="font-family:Arial">) in the case of personal delivery or electronic-</span><span style="font-family:Arial">mail ,</span><span style="font-family:Arial"> on the date of such delivery, (ii) in the case od delivery by a nationally recognized overnight carrier, on the third business day following dispatch and (iii) in the case of mailing, on the seventh business day following such mailing.</span></p>
                <p style="margin-top:0pt; margin-left:39pt; margin-bottom:0pt; text-indent:-18pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">(e)</span><span style="font:7pt 'Times New Roman'">&nbsp; </span><span style="font-family:Arial">T</span><span style="font-family:Arial">his Agreement is personal in nature, and neither party may directly or indirectly assign or transfer it by operation of law or otherwise the prior written consent of the other party, which consent will not be unreasonably withheld. All obligation contained in this Agreement shall extend to and be binding upon the parties to this Agreement and their respective successors, assign and design</span><span style="font-family:Arial">ees.</span></p>
                <p style="margin-top:0pt; margin-left:39pt; margin-bottom:0pt; text-indent:-18pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">(f)</span><span style="font:7pt 'Times New Roman'">&nbsp;&nbsp;&nbsp;&nbsp; </span><span style="font-family:Arial">T</span><span style="font-family:Arial">he receipt of Confidential Information pursuant to this Agreement will not prevent or in any way limit either party from: (</span><span style="font-family:Arial">i</span><span style="font-family:Arial">) developing, making or marketing products or services that are or may be competitive with the products or services of the other; or (ii) providing products or services to other who compete with the other.</span></p>
                <p style="margin-top:0pt; margin-left:39pt; margin-bottom:0pt; text-indent:-18pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">(g)</span><span style="font:7pt 'Times New Roman'">&nbsp; </span><span style="font-family:Arial">P</span><span style="font-family:Arial">aragraph headings used in this Agreement are for reference only and shall not be used or relied upon in the interpretation of this Agreement.</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial"> </span><span style="font-family:Arial"> </span><span style="font-family:Arial"> </span><span style="font-family:Arial"> </span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">I</span><span style="font-family:Arial">N WITNESS WHEREOF, the parties hereto have executed th</span><span style="font-family:Arial">is</span><span style="font-family:Arial"> Agreement as of the date first above written.</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p>
                <table cellspacing="0" cellpadding="0" style="border-collapse:collapse">
                    <tbody>
                    <tr>
                        <td style=" border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top"><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">D</span><span style="font-family:Arial">isclosing Party</span></p></td>
                        <td style=" border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top"><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">R</span><span style="font-family:Arial">eceiving Party</span></p></td>
                    </tr>
                    <tr>
                        <td style=" border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top"><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">B</span><span style="font-family:Arial">y</span></p><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial"> </span><span style="font-family:Arial"> _______</span></p><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">N</span><span style="font-family:Arial">ame</span><span style="font-family:Arial">:</span></p><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">N</span><span style="font-family:Arial">RIC:</span></p></td>
                        <td style=" border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top"><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">B</span><span style="font-family:Arial">y</span></p><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial"> </span><span style="font-family:Arial"> _______</span></p><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">N</span><span style="font-family:Arial">ame</span><span style="font-family:Arial">:</span></p><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">N</span><span style="font-family:Arial">RIC:</span></p></td>
                    </tr>
                    </tbody>
                </table>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p>
                <table cellspacing="0" cellpadding="0" style="border-collapse:collapse">
                    <tbody>
                    <tr>
                        <td style="width:89.9pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top"><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">W</span><span style="font-family:Arial">itness</span></p></td>
                        <td style="width:89.9pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top"><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">W</span><span style="font-family:Arial">itness</span></p></td>
                    </tr>
                    <tr>
                        <td style="width:89.9pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top"><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">B</span><span style="font-family:Arial">y</span></p><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial"> </span><span style="font-family:Arial"> ______</span></p><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">N</span><span style="font-family:Arial">ame</span><span style="font-family:Arial">:</span></p><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">N</span><span style="font-family:Arial">RIC:</span></p></td>
                        <td style="width:89.9pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top"><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">B</span><span style="font-family:Arial">y</span></p><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial"> </span><span style="font-family:Arial"> ______</span></p><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">N</span><span style="font-family:Arial">ame</span><span style="font-family:Arial">:</span></p><p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">N</span><span style="font-family:Arial">RIC:</span></p></td>
                    </tr>
                    </tbody>
                </table>
                <p style="margin-top:0pt; margin-bottom:0pt; text-align:justify; widows:0; orphans:0; font-size:12pt"><span style="font-family:Arial">&nbsp;</span></p>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        new Vue({
            el: "#app",
            data: {
                uid:"{{request()->get('user_id')??(Auth::check()?Auth::user()->user_id:0)}}",
                introducer_id:'',
                introducer_name:'',
                nda:'',
                select:'1',
                email:'',
                address:'',
                re_confirm_password:'',
                password:'',
                tel:'',
                nric:'',
                name:'',
                user_id:'',
            },
            methods: {
                getRegistration: function () {
                    if(this.uid==0){
                        window.location.href='/';
                        return false;
                    }
                    let that = this;
                    $.ajax({
                        url:"{{ route('getRegistration') }}",
                        type: 'get',
                        data: {user_id:that.uid},
                        dataType: 'json',
                        success: function (res) {
                            that.introducer_id=res.user.user_id;
                            that.introducer_name=res.user.name;
                        }
                    })
                },
                saveRegistration(){

                    if (!this.user_id){
                        $("#user_msg").html('The User-Id cannot be empty');
                        return false;
                    }
                    if (this.user_id.length>8 ){
                        $("#user_msg").html('The User-Id Maximum 8 digits');
                        return false;
                    }
                    $("#user_msg").html("");
                    if (!this.name) {
                        $("#name_msg").html('The Name cannot be empty');
                        return false;
                    }
                    if (this.name.length>16 ){
                        $("#user_msg").html('The Name Maximum 16 digits');
                        return false;
                    }
                    $("#name_msg").html("");
                    if (!this.nric) {
                        $("#nric_msg").html('The Nric cannot be empty');
                        return false;
                    }
                    $("#nric_msg").html("");
                    if (!this.tel) {
                        $("#tel_msg").html('The Tel cannot be empty');
                        return false;
                    }
                    if (this.tel.length>14) {
                        $("#tel_msg").html('The Tel Maximum 16 digits');
                        return false;
                    }
                    $("#tel_msg").html("");
                    if (!this.password) {
                        $("#password_msg").html('The Password cannot be empty');
                        return false;
                    }
                    if (this.password.length>8) {
                        $("#password_msg").html('The Password Maximum 8 digits');
                        return false;
                    }
                    if(this.password!=this.re_confirm_password){
                        $("#password_msg").html('Inconsistent passwords');
                        return false;
                    }
                    $("#password_msg").html('');
                    if(this.email){
                        let reg = /^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/;
                        if(!reg.test(this.email)){
                            $("#email_msg").html('Email format error');
                            return false;
                        }
                    }
                    $("#email_msg").html('');

                    if (!this.nda) {
                        $("#nda_msg").html('Please tick NDA');
                        return false;
                    }
                    $("#nda_msg").html('');
                    let that = this;
                    $.ajax({
                        url:"{{ route('createRegistration') }}",
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            introducer_id:that.introducer_id,
                            user_id:that.user_id,name:that.name,nric:that.nric,
                            tel:that.tel,password:that.password,address:that.address,email:that.email,select:that.select
                        },
                        dataType: 'json',
                        success: function (res) {
                            if(res.code==1){
                                $("#"+res.error).html(res.msg);
                                alert(res.msg)
                            }else {
                                alert(res.msg)
                                that.user_id='';
                                that.name='';
                                that.nric='';
                                that.tel='';
                                that.password='';
                                that.re_confirm_password='';
                                that.address='';
                                that.email='';

                            }

                        }
                    })
                },
                nad(){
                    var modal = new Custombox.modal({
                        content: {
                            effect: 'fadein',
                            target: '#demo-modal'
                        }
                    });
                    modal.open();
                }
            },
            created() {
                this.getRegistration();
            }

        })

    </script>
@endsection
