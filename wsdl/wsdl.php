<?php
header("Content-Type: text/xml; charset=utf-8");
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
?>
<!-- edited with XMLSpy v2011 rel. 2 (http://www.altova.com) by Sasha (QS) -->
<wsdl:definitions xmlns:wsdl="http://schemas.xmlsoap.org/wsdl/" xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/"
                  xmlns:http="http://schemas.xmlsoap.org/wsdl/http/" xmlns:xs="http://www.w3.org/2001/XMLSchema"
                  xmlns:wsaw="http://www.w3.org/2006/05/addressing/wsdl" xmlns:tns="http://uws.provider.com/"
                  name="ProviderWebService" targetNamespace="http://uws.provider.com/">
    <wsdl:types>
        <xs:schema>
            <xs:import namespace="http://uws.provider.com/" schemaLocation="ProviderWebService.xsd"/>
        </xs:schema>
    </wsdl:types>
    <wsdl:message name="PerformTransactionRequest">
        <wsdl:part name="arguments" element="tns:PerformTransactionArguments"/>
    </wsdl:message>
    <wsdl:message name="PerformTransactionResponse">
        <wsdl:part name="result" element="tns:PerformTransactionResult"/>
    </wsdl:message>
    <wsdl:message name="CheckTransactionRequest">
        <wsdl:part name="arguments" element="tns:CheckTransactionArguments"/>
    </wsdl:message>
    <wsdl:message name="CheckTransactionResponse">
        <wsdl:part name="result" element="tns:CheckTransactionResult"/>
    </wsdl:message>
    <wsdl:message name="CancelTransactionRequest">
        <wsdl:part name="arguments" element="tns:CancelTransactionArguments"/>
    </wsdl:message>
    <wsdl:message name="CancelTransactionResponse">
        <wsdl:part name="result" element="tns:CancelTransactionResult"/>
    </wsdl:message>
    <wsdl:message name="GetStatementRequest">
        <wsdl:part name="arguments" element="tns:GetStatementArguments"/>
    </wsdl:message>
    <wsdl:message name="GetStatementResponse">
        <wsdl:part name="result" element="tns:GetStatementResult"/>
    </wsdl:message>
    <wsdl:message name="GetInformationRequest">
        <wsdl:part name="arguments" element="tns:GetInformationArguments"/>
    </wsdl:message>
    <wsdl:message name="GetInformationResponse">
        <wsdl:part name="result" element="tns:GetInformationResult"/>
    </wsdl:message>
    <wsdl:message name="ChangePasswordRequest">
        <wsdl:part name="arguments" element="tns:ChangePasswordArguments"/>
    </wsdl:message>
    <wsdl:message name="ChangePasswordResponse">
        <wsdl:part name="result" element="tns:ChangePasswordResult"/>
    </wsdl:message>
    <wsdl:portType name="ProviderWebService">
        <wsdl:operation name="PerformTransaction">
            <wsdl:input message="tns:PerformTransactionRequest" wsaw:Action="urn:PerformTransactionRequest"/>
            <wsdl:output message="tns:PerformTransactionResponse" wsaw:Action="urn:PerformTransactionResponse"/>
        </wsdl:operation>
        <wsdl:operation name="CheckTransaction">
            <wsdl:input message="tns:CheckTransactionRequest" wsaw:Action="urn:CheckTransactionRequest"/>
            <wsdl:output message="tns:CheckTransactionResponse" wsaw:Action="urn:CheckTransactionResponse"/>
        </wsdl:operation>
        <wsdl:operation name="CancelTransaction">
            <wsdl:input message="tns:CancelTransactionRequest" wsaw:Action="urn:CancelTransactionRequest"/>
            <wsdl:output message="tns:CancelTransactionResponse" wsaw:Action="urn:CancelTransactionResponse"/>
        </wsdl:operation>
        <wsdl:operation name="GetStatement">
            <wsdl:input message="tns:GetStatementRequest" wsaw:Action="urn:GetStatementRequest"/>
            <wsdl:output message="tns:GetStatementResponse" wsaw:Action="urn:GetStatementResponse"/>
        </wsdl:operation>
        <wsdl:operation name="GetInformation">
            <wsdl:input message="tns:GetInformationRequest" wsaw:Action="urn:GetInformationRequest"/>
            <wsdl:output message="tns:GetInformationResponse" wsaw:Action="urn:GetInformationResponse"/>
        </wsdl:operation>
        <wsdl:operation name="ChangePassword">
            <wsdl:input message="tns:ChangePasswordRequest" wsaw:Action="urn:ChangePasswordRequest"/>
            <wsdl:output message="tns:ChangePasswordResponse" wsaw:Action="urn:ChangePasswordResponse"/>
        </wsdl:operation>
    </wsdl:portType>
    <wsdl:binding name="ProviderWebServiceBinding" type="tns:ProviderWebService">
        <soap:binding style="document" transport="http://schemas.xmlsoap.org/soap/http"/>
        <wsdl:operation name="PerformTransaction">
            <soap:operation name="PerformTransaction" soapAction="urn:PerformTransaction" style="document"/>
            <wsdl:input>
                <soap:body use="literal"/>
            </wsdl:input>
            <wsdl:output>
                <soap:body use="literal"/>
            </wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="CheckTransaction">
            <soap:operation name="CheckTransaction" soapAction="urn:CheckTransaction" style="document"/>
            <wsdl:input>
                <soap:body use="literal"/>
            </wsdl:input>
            <wsdl:output>
                <soap:body use="literal"/>
            </wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="CancelTransaction">
            <soap:operation name="CancelTransaction" soapAction="urn:CancelTransaction" style="document"/>
            <wsdl:input>
                <soap:body use="literal"/>
            </wsdl:input>
            <wsdl:output>
                <soap:body use="literal"/>
            </wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="GetStatement">
            <soap:operation name="GetStatement" soapAction="urn:GetStatement" style="document"/>
            <wsdl:input>
                <soap:body use="literal"/>
            </wsdl:input>
            <wsdl:output>
                <soap:body use="literal"/>
            </wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="GetInformation">
            <soap:operation name="GetInformation" soapAction="urn:GetInformation" style="document"/>
            <wsdl:input>
                <soap:body use="literal"/>
            </wsdl:input>
            <wsdl:output>
                <soap:body use="literal"/>
            </wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="ChangePassword">
            <soap:operation name="ChangePassword" soapAction="urn:ChangePassword" style="document"/>
            <wsdl:input>
                <soap:body use="literal"/>
            </wsdl:input>
            <wsdl:output>
                <soap:body use="literal"/>
            </wsdl:output>
        </wsdl:operation>
    </wsdl:binding>
    <wsdl:service name="ProviderWebService">
        <wsdl:port name="ProviderWebServicePort" binding="tns:ProviderWebServiceBinding">
            <soap:address location="<?php echo Constants::INDEX_URL ?>"/>
        </wsdl:port>
    </wsdl:service>
</wsdl:definitions>
